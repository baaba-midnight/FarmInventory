<?php

// this page will use session management to assign the author to $_SESSION['username']

require '../vendor/autoload.php';

function generatePDFReport($reportType, $data) {
    // Initialize TCPDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Farm Management System'); // $_SESSION['username']
    $pdf->SetTitle("$reportType Report");
    $pdf->SetSubject('Report');
    $pdf->SetKeywords('Farm, Report, PDF');

    // Add a page
    $pdf->AddPage();

    // Header content based on the report type
    $html = "<h1>$reportType Report</h1>";
    $html .= "<p>Generated on: " . date('Y-m-d H:i:s') . "</p>";

    // Generate content dynamically based on the report type
    if ($reportType === 'User Activity') {
        $html .= "<table border='1' cellpadding='5'>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Activity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($data as $row) {
            $html .= "<tr>
                        <td>{$row['user']}</td>
                        <td>{$row['activity']}</td>
                        <td>{$row['date']}</td>
                      </tr>";
        }
        $html .= "</tbody></table>";
    } elseif ($reportType === 'Inventory Equipment Status') {
        $html .= "<table border='1' cellpadding='5'>
                    <thead>
                        <tr>
                            <th>Equipment</th>
                            <th>Status</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($data as $row) {
            $html .= "<tr>
                        <td>{$row['equipment']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['quantity']}</td>
                      </tr>";
        }
        $html .= "</tbody></table>";
    } elseif ($reportType === 'Farm Inventory and Crops') {
        $html .= "<table border='1' cellpadding='5'>
                    <thead>
                        <tr>
                            <th>Crop/Item</th>
                            <th>Type</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($data as $row) {
            $html .= "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['type']}</td>
                        <td>{$row['quantity']}</td>
                      </tr>";
        }
        $html .= "</tbody></table>";
    }

    // Add content to PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF for download
    $pdf->Output("$reportType.pdf", 'D'); // 'D' forces download
}
?>
