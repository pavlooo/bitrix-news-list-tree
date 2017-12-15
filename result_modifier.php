<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/*Манипуляции с категориями*/
$arFilter = Array('IBLOCK_ID' => $arParams['IBLOCK_ID']);

$rs_Section = CIBlockSection::GetList(
    array('DEPTH_LEVEL' => 'desc'),
    $arFilter,
    false,
    array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'DEPTH_LEVEL', 'SORT')
);
$ar_SectionList = array();
$ar_DepthLavel = array();
while ($ar_Section = $rs_Section->GetNext(true, false)) {
    $ar_SectionList[$ar_Section['ID']] = $ar_Section;
    $ar_DepthLavel[] = $ar_Section['DEPTH_LEVEL'];
}

$ar_DepthLavelResult = array_unique($ar_DepthLavel);
rsort($ar_DepthLavelResult);

$i_MaxDepthLevel = $ar_DepthLavelResult[0];

for ($i = $i_MaxDepthLevel; $i > 1; $i--) {
    foreach ($ar_SectionList as $i_SectionID => $ar_Value) {
        if ($ar_Value['DEPTH_LEVEL'] == $i) {
            $ar_SectionList[$ar_Value['IBLOCK_SECTION_ID']]['SUB_SECTION'][] = $ar_Value;
            unset($ar_SectionList[$i_SectionID]);
        }
    }
}

function __sectionSort($a, $b)
{
    if ($a['SORT'] == $b['SORT']) {
        return 0;
    }
    return ($a['SORT'] < $b['SORT']) ? -1 : 1;
}

usort($ar_SectionList, "__sectionSort");

$arResult['SECTIONS_LIST'] = $ar_SectionList;
/*Манипуляции с категориями*/

/*Раскидываем элементы по секциям*/
$arResult['ELEMENTS_LIST'] = [];

foreach($arResult['ITEMS'] as $arEl){
    if($arEl['IBLOCK_SECTION_ID']) {
        $arResult['ELEMENTS_LIST'][$arEl['IBLOCK_SECTION_ID']][$arEl['ID']] = $arEl;
    }else{
        $arResult['ELEMENTS_LIST']['ROOT'][$arEl['ID']] = $arEl;
    }
}
/*Раскидываем элементы по секциям*/