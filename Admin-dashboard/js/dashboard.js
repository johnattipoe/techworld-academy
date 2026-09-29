document.addEventListener('DOMContentLoaded', () => {


  const readChartData = (id) => {
    const node = document.getElementById(id);
    if (!node) return null;
    try { return JSON.parse(node.textContent); } catch (error) { return null; }
  };
  const palette = { purple: '#5146d9', green: '#1d9a70', blue: '#4d8ed8', amber: '#e4a63c', grid: '#edf0f5', text: '#7e899c' };
  const baseOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { display: false }, tooltip: { displayColors: false, padding: 10, cornerRadius: 8 } },
    scales: {
      x: { grid: { display: false }, border: { display: false }, ticks: { color: palette.text, font: { family: 'DM Sans', size: 10 }, maxRotation: 0, autoSkip: true } },
      y: { beginAtZero: true, border: { display: false, dash: [3, 4] }, grid: { color: palette.grid }, ticks: { color: palette.text, font: { family: 'DM Sans', size: 10 }, precision: 0 } }
    }
  };

  const enrollmentCanvas = document.getElementById('enrollmentChart');
  const enrollmentData = readChartData('enrollmentChartData');
  if (window.Chart && enrollmentCanvas && enrollmentData) {
    Chart.getChart(enrollmentCanvas)?.destroy();
    new Chart(enrollmentCanvas, {
      type: 'line',
      data: { labels: enrollmentData.labels, datasets: [{ label: window.twDashTranslate('Enrollments'), data: enrollmentData.values, borderColor: palette.purple, backgroundColor: 'rgba(81,70,217,.10)', fill: true, tension: .35, pointRadius: 2, pointHoverRadius: 5, borderWidth: 2 }] },
      options: { ...baseOptions, interaction: { intersect: false, mode: 'index' } }
    });
  }

  const revenueCanvas = document.getElementById('revenueTrendChart');
  const revenueData = readChartData('revenueChartData');
  const rangeSelect = document.getElementById('adminRevenueRange');
  let revenueChart = null;
  if (window.Chart && revenueCanvas && revenueData) {
    const getRange = () => Math.min(revenueData.labels.length, Math.max(1, Number(rangeSelect?.value || 12)));
    const updateRevenueRange = () => {
      const count = getRange();
      const labels = revenueData.labels.slice(-count);
      const values = revenueData.values.slice(-count);
      if (!revenueChart) {
        revenueChart = new Chart(revenueCanvas, {
          type: 'bar',
          data: { labels, datasets: [{ label: window.twDashTranslate('Revenue (GHS)'), data: values, backgroundColor: 'rgba(29,154,112,.78)', hoverBackgroundColor: palette.green, borderRadius: 5, maxBarThickness: 26 }] },
          options: {
            ...baseOptions,
            interaction: { intersect: false, mode: 'index' },
            plugins: { ...baseOptions.plugins, tooltip: { ...baseOptions.plugins.tooltip, callbacks: { label: (context) => ' GHS ' + Number(context.raw || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }) } } },
            scales: { ...baseOptions.scales, y: { ...baseOptions.scales.y, ticks: { ...baseOptions.scales.y.ticks, callback: (value) => 'GHS ' + Number(value).toLocaleString() } } }
          }
        });
      } else {
        revenueChart.data.labels = labels;
        revenueChart.data.datasets[0].data = values;
        revenueChart.update();
      }
    };
    Chart.getChart(revenueCanvas)?.destroy();
    updateRevenueRange();
    rangeSelect?.addEventListener('change', updateRevenueRange);
    document.getElementById('exportRevenueCsv')?.addEventListener('click', () => {
      if (!revenueChart) return;
      const rows = [[window.twDashTranslate('Month'), window.twDashTranslate('Revenue (GHS)')], ...revenueChart.data.labels.map((label, index) => [label, revenueChart.data.datasets[0].data[index]])];
      const csv = rows.map(row => row.map(value => '"' + String(value ?? '').replaceAll('"', '""') + '"').join(',')).join('\r\n');
      const url = URL.createObjectURL(new Blob([csv], { type: 'text/csv;charset=utf-8' }));
      const link = document.createElement('a');
      link.href = url;
      link.download = 'admin-revenue-trend.csv';
      link.click();
      URL.revokeObjectURL(url);
    });
  }

  const roleCanvas = document.getElementById('userCompositionChart');
  const roleData = readChartData('roleChartData');
  if (window.Chart && roleCanvas && roleData) {
    Chart.getChart(roleCanvas)?.destroy();
    new Chart(roleCanvas, {
      type: 'doughnut',
      data: { labels: roleData.labels, datasets: [{ data: roleData.values, backgroundColor: [palette.purple, palette.green, palette.blue], borderColor: '#fff', borderWidth: 4, hoverOffset: 5 }] },
      options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, pointStyle: 'circle', boxWidth: 7, boxHeight: 7, padding: 18, color: palette.text, font: { family: 'DM Sans', size: 11 } } }, tooltip: { padding: 10, cornerRadius: 8 } } }
    });
  }

  const search = document.getElementById('userSearch');
  const role = document.getElementById('roleFilter');
  const table = document.getElementById('usersTable');
  if (search && table) {
    const filter = () => Array.from(table.tBodies).forEach(body => Array.from(body.rows).forEach(row => {
      row.hidden = !(row.textContent.toLowerCase().includes(search.value.trim().toLowerCase()) && (!role || !role.value || row.dataset.role === role.value));
    }));
    search.addEventListener('input', filter);
    role?.addEventListener('change', filter);
  }
});