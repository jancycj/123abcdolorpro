$(function () {
  Morris.Donut({
    element: 'graph',
    data: [
      {value: 59, label: 'Open Vacancies', formatted: '59' },
      {value: 15, label: 'Applied Shifts', formatted: '15' },
      {value: 35, label: 'Assigned Candidate', formatted: '35' },
    ],
    colors: [
      '#00cccc',
      '#5b47fb',
      '#fd7e14',
      '#95D7BB'
    ],
    formatter: function (x, data) { return data.formatted; }
  });
  prettyPrint();
});
$(function () {
  Morris.Donut({
    element: 'timesheet',
   
    data: [
      {value: 35, label: 'Total Timesheets Hours', formatted: '1800' },
      {value: 15, label: 'Approved Timesheet Hours', formatted: '800' },
      {value: 10, label: 'Invoices Timesheet Hours', formatted: '200' },
      {value: 10, label: 'Pending Timesheet Hours', formatted: '800' },
      {value: 10, label: 'Pending Timesheet Hours', formatted: '800' },
      {value: 5, label: 'Pending Timesheet Hours', formatted: '800' }
    ],
    colors: [
      '#00cccc',
      '#5b47fb',
      '#fd7e14',
      '#f10075',
      '#3b4863',
      '#f90018',
    ],
    formatter: function (x, data) { return data.formatted; }
  });
  prettyPrint();
});
$(function () {
  Morris.Donut({
    element: 'graph1',
   
    data: [
      {value: 70, label: 'Total Invoices', formatted: '£100 000,00' },
      {value: 15, label: 'Paid Invoices', formatted: '£700,00' },
      {value: 10, label: 'Invoices Overdue < 30 days', formatted: '£150,00' },
      {value: 5, label: 'A really really long label', formatted: '5%' }
    ],
    colors: [
      '#00cccc',
      '#5b47fb',
      '#fd7e14',
      '#f10075',
    ],
    formatter: function (x, data) { return data.formatted; }
  });
  prettyPrint();
});

