<?php
require_once('TCPDF-main/tcpdf.php'); // Adjust path if needed
include 'includes/conn.php'; // Adjust path if needed

// Create PDF Object
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('SSC Voters List');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Add Logo (Optional)
$pdf->Image('image.png', 20, 10, 20, 20); // Adjust path and size
$pdf->Ln(3);

// Title
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(0, 10, 'St. Rose College Educational Foundation INC.', 0, 1, 'C');

// Set non-bold for "Voters List"
$pdf->SetFont('Helvetica', '', 14);
$pdf->Cell(0, 7, 'Voters List Report', 0, 1, 'C');

$pdf->Ln(5);

// Define column headers
$headers = ['Voters ID', 'Lastname', 'Firstname', 'Year', 'Department', 'Email'];
$columnKeys = ['voters_id', 'lastname', 'firstname', 'year', 'department', 'gmail'];
$colWidths = [20, 30, 30, 15, 45, 50]; // Adjusted column widths

// Calculate starting X position to center the table
$totalWidth = array_sum($colWidths);
$startX = (210 - $totalWidth) / 2;

// Table Header Styling
$pdf->SetFillColor(0, 102, 204); // Blue header background
$pdf->SetTextColor(255, 255, 255); // White text color
$pdf->SetFont('Helvetica', 'B', 11);

// Move to calculated starting X position
$pdf->SetX($startX);

// Print Table Header
foreach ($headers as $index => $header) {
    $pdf->Cell($colWidths[$index], 10, $header, 1, 0, 'C', true);
}
$pdf->Ln();

// Reset font color & background
$pdf->SetFont('Helvetica', '', 10);
$pdf->SetTextColor(0, 0, 0);

// Fetch Data
$sql = "SELECT * FROM voters ORDER BY department ASC, year ASC, lastname ASC";
$query = $conn->query($sql);
$fill = false; // Alternate row colors

while ($row = $query->fetch_assoc()) {
    $pdf->SetFillColor(240, 240, 240); // Light gray for alternating rows
    $pdf->SetX($startX);

    // Store the starting Y position
    $startY = $pdf->GetY();
    $rowHeight = 7; // Default row height

    // Measure the maximum height needed in this row
    foreach ($columnKeys as $index => $key) {
        $cellHeight = $pdf->getStringHeight($colWidths[$index], $row[$key]); // Measure text height
        if ($cellHeight > $rowHeight) {
            $rowHeight = $cellHeight; // Adjust row height if needed
        }
    }

    // Print each cell at the calculated height
    foreach ($columnKeys as $index => $key) {
        $pdf->MultiCell($colWidths[$index], $rowHeight, $row[$key], 1, 'L', $fill, 0);
    }

    // Move to next row manually
    $pdf->Ln();
    $fill = !$fill; // Alternate row colors
}

// Output PDF
$pdf->Output('voters_list.pdf', 'I');

?>
