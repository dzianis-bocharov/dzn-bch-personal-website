$('document').ready(function(){
    
  function setupCanvas(canvas) {
    var dpr = window.devicePixelRatio || 1;
    var rect = canvas.getBoundingClientRect();
    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    var ctx = canvas.getContext('2d');
    ctx.scale(dpr, dpr);
    return ctx;
  }
    
  var ctx = setupCanvas(document.querySelector('#mainCanvas'));

  ctx.font = "24px serif";

  ctx.fillText("...", 5, 20);

  $('#launch').on('click', ()=>{
      ctx.clearRect(0, 0, ctx.canvas.width,  ctx.canvas.height);
      $.ajax({
        type: "GET",
        url: "php/jsFileToArray.php",
        dataType: "script",
        success: function (data) {
          ctx.font = "18px serif";
          const list_of_functions = javascript_array;
          // alert(error_mesage);
          let x = 3;
          let w = 0;
          ctx.canvas.height = list_of_functions.length*70+20;
          const z = window.devicePixelRatio;
          ctx.scale(z, z);
          $('.wideDiv').removeClass('btn-scroll-no').addClass('btn-scroll-yes');
          for (let i = 0; i < list_of_functions.length; i++) {
            // ctx.beginPath();
            // ctx.rect(20,20+ i * 70,175,50)
            // ctx.stroke();
            // ctx.font = "18px serif";
            ctx.font = "16px serif";
            // ctx.fillText(list_of_functions[w], 30, 50 + i * 70);
            ctx.fillText(list_of_functions[w], 10, 20 + i * 20);
            w++;
          }
        }
      });
    })
});