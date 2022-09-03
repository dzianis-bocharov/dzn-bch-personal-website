import {canvas_blur_fix} from './canvas-blur-fix.js'; 
function file_ierarchy_scheme_tab(canvas, main_canvas_id, call_stack) {
   let ctx = canvas;
   ctx.clearRect(0, 0, ctx.canvas.width,  ctx.canvas.height);
   let group_of_elements_gap = 60;
   let base_size = 100;
   let elements_quantity = 8;
   let lineWidth = 2;
   let element_height = base_size; 
   let element_width = element_height*2;
   let element_gap_right = base_size*0.25
   let element_gap_bottom = base_size*0.5
   let canvas_width = $('.div-main-canvas').width();
   let column_quantity = Math.floor((canvas_width-base_size*1.2)/(element_width+element_gap_right));
   let current_column=0;
   let rows = 0;
   let i = 0;
   let rows_for_canvas_height = Math.ceil(elements_quantity/column_quantity);
   let canvas_height = group_of_elements_gap + (element_height + element_gap_bottom)*rows_for_canvas_height + element_gap_bottom;
   $(main_canvas_id).attr('height', canvas_height);
   $(main_canvas_id).css('height', canvas_height);
   $(main_canvas_id).attr('width',$('.div-main-canvas').width()-20);
   $(main_canvas_id).css('width',$('.div-main-canvas').width()-20);
   canvas_blur_fix(document.querySelector('#mainCanvas'));



//----------------------------------------------------------------------------------------------------
//----------холст / устранение эффекта размытия
//----------------------------------------------------------------------------------------------------





//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------




   ctx.font = "18px serif";
   ctx.fillText("классы", 10, group_of_elements_gap/2+5);
   while(i<elements_quantity){
      current_column++;
      ctx.strokeStyle = "black";
      ctx.lineWidth = lineWidth;
      ctx.strokeRect(
         12+(current_column-1)*(element_width+element_gap_right), 
         group_of_elements_gap+(element_height+element_gap_bottom)*rows, 
         element_width, 
         element_height
      );
      ctx.font = "16px serif";
      let innerText = '<name-of-class>';
      ctx.fillText(
         innerText, 
         22+(current_column-1)*(element_width+element_gap_right), 
         85+(element_height+element_gap_bottom)*rows
      );
//горизонтальные линии
      ctx.beginPath();
      ctx.moveTo(
         12-2+element_width*0.5+ (element_width+element_gap_right)*(current_column-1),
         group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows+1),
      );
      ctx.lineTo(
         12-2+element_width*0.5+ (element_width+element_gap_right)*(current_column-1),
         group_of_elements_gap+(element_height+element_gap_bottom)*rows+element_height, 
         );
      ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(
         12+2+element_width*0.5+ (element_width+element_gap_right)*(current_column-1),
         group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows+1),
      );
      ctx.lineTo(
         12+2+element_width*0.5+ (element_width+element_gap_right)*(current_column-1),
         group_of_elements_gap+(element_height+element_gap_bottom)*rows+element_height, 
         );
      ctx.stroke();
      if(current_column==column_quantity || i+1 == elements_quantity){
         rows++;
//стебель
         if(rows>1){
            ctx.beginPath();
            ctx.moveTo(
               12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
               group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows-1)
            );
            ctx.lineTo(
               12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
               group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows)
               );
            ctx.stroke();
            ctx.moveTo(
               4+12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
               group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows-1)
            );
            ctx.lineTo(
               4+12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
               group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows)
               );
            ctx.stroke();
         };
//горизонтальные линии
         ctx.beginPath();
         ctx.moveTo(
            12+element_width*0.5,
            group_of_elements_gap-2-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows),
         );
         ctx.lineTo(
            12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
            group_of_elements_gap-2-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows),
         );
         ctx.stroke();
         ctx.beginPath();
         ctx.moveTo(
            12+element_width*0.5,
            group_of_elements_gap+2-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows),
         );
         ctx.lineTo(
            12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
            group_of_elements_gap+2-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(rows),
         );
         ctx.stroke();
         current_column=0;
      };
      i++;
   };
//круги на горизонтальной линии
   let a1 = 0;
   let b1 = 0;
   let c1 = 0;
   while(a1<elements_quantity){
      a1++;
      b1++;
      ctx.beginPath();
      ctx.arc(
         12+element_width*0.5+ (element_width+element_gap_right)*(b1-1),
         group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(c1+1),
         4, 0, 2 * Math.PI);
      ctx.fillStyle = 'lime';
      ctx.fill();
      ctx.stroke();
      if(b1==column_quantity){
         b1=0;
         c1++;
      }
   };
//круги на стебле
   let g = 0;
   while(g<rows){
      ctx.beginPath();
      ctx.arc(
         2+12+(column_quantity-1)*(element_width+element_gap_right) + element_width + base_size*0.5,
         group_of_elements_gap-element_gap_bottom*0.5+(element_height+element_gap_bottom)*(g+1),
         4, 0, 2 * Math.PI);
      ctx.fillStyle = 'lime';
      ctx.fill();
      ctx.stroke();
      g++;
   };
}; 
export {file_ierarchy_scheme_tab};