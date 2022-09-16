function element_code_tab(main_state) {

    //---ПОЧИНИТЬ!---
    let first_line = 6576;
    let last_line = 7303;

    let text_for_export = '';
    for (let i = first_line-1; i < last_line; i++) {
        text_for_export = text_for_export + main_state['all_lines'][i];
    };
    $('#element-code-inside').html(text_for_export);
};

export {element_code_tab};