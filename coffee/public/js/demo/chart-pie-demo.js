// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
// var daysElapsedData = @json($daysElapsedData);
// Pie Chart Example
// ตรวจสอบค่าของ daysElapsedData
console.log(daysElapsedData);

var ctx = document.getElementById("myPieChart");
if (ctx) {
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["More than 30 days", "15 to 30 days", "0 to 15 days"],
      datasets: [{
        data: [
          daysElapsedData.daysMoreThan30,
          daysElapsedData.daysBetween15And30 ,
          daysElapsedData.daysBetween0And15 
        ],
        backgroundColor: ['#FF204E', '#FAEF5D', '#58E481'],
        hoverBackgroundColor: ['#7D0A0A', '#F8DE22', '#4A772F'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
    },
  });
}
