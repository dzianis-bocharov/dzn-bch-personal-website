 function file_code_tab(extracted_data) {
    console.log(Object.keys(extracted_data['all_lines']).length);
    let w = Object.keys(extracted_data['all_lines']).length;
    let code_of_file = '';
    for (let i = 0; i < w; i++) {
        code_of_file = code_of_file + extracted_data['all_lines'][i];
    }
    $('.file-code-inside').html(code_of_file);
};
export {file_code_tab};