var marksCanvas = document.getElementById("canvas1");

var marksData = {
  labels: ["English", "Maths", "Physics"],
  datasets: [{
    label: "Student A",
    backgroundColor: "rgba(200,0,0,0.2)",
    data: [65, 75, 70]
  }, {
    label: "Student B",
    backgroundColor: "rgba(0,0,200,0.2)",
    data: [54, 65, 60]
  }]
};

var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData
});