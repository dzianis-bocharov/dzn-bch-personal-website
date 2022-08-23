<?php


//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------

    function buildTree($elements, $parentId = 0) {
        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                array_push($branch,$element);
            }
        }
        return $branch;
    };
    

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------


    $rows = [['id'=>'1', 'parent_id'=>'0','title'=>'Parent Page'],['id'=>'2','parent_id'=>'1','title'=>'Sub Page'],['id'=>'3','parent_id'=>'2','title'=>'Sub Sub Page'],['id'=>'4','parent_id'=>'0','title'=>'Another Parent Page']];

    $tree = buildTree($rows);

    echo '<br><br><br>';

    foreach($tree as $value) {
        print_r($value);
        echo '<br><br>';
    }

?>