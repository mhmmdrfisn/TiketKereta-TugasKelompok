function exportToXLSX() {
  const table = document.querySelector('table');
  const rows = Array.from(table.querySelectorAll('tr'));

  const data = rows.map(row => {
    const rowData = [];
    Array.from(row.querySelectorAll('th, td')).forEach(cell => {
      rowData.push(cell.innerText);
    });
    return rowData;
  });

  const worksheet = XLSX.utils.aoa_to_sheet(data);
  const workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

  XLSX.writeFile(workbook, 'data.xlsx');
}
function printData() {
    const table = document.querySelector('table');
    const printContent = document.createElement('div');
    printContent.appendChild(table.cloneNode(true));
  
    const totalPendapatan = document.querySelector('.mb-4 h4').innerText;
    const searchInfo = document.querySelector('.mb-4 p').innerText;
  
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
      <html>
        <head>
          <title>Data Detail Pendapatan</title>
          <style>
            @page {
              size: A4;
              margin: 0;
            }
  
            body {
              font-family: Arial, sans-serif;
              font-size: 12px;
              margin: 0;
              padding: 30px;
            }
  
            .header {
              text-align: center;
              margin-bottom: 20px;
            }
  
            h1 {
              font-size: 24px;
              margin-bottom: 10px;
            }
  
            h3 {
              font-size: 16px;
              margin-bottom: 5px;
            }
  
            p {
              margin-bottom: 5px;
            }
  
            .content {
              margin-top: 30px;
            }
  
            table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 20px;
            }
  
            th, td {
              padding: 8px;
              border: 1px solid #ddd;
              text-align: left;
            }
  
            th {
              background-color: #f2f2f2;
            }
          </style>
        </head>
        <body>
          <div class="header">
            <h1>HealingLoko</h1>
            <h3>Data Detail Pendapatan</h3>
            <p>${searchInfo}</p>
            <p>Total Pendapatan: ${totalPendapatan}</p>
          </div>
          <div class="content">
            ${printContent.innerHTML}
          </div>
        </body>
      </html>
    `);
  
    printWindow.document.close();
    printWindow.print();
  }
  