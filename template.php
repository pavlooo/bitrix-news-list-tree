<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="info-it-base-container">
    <?php
    foreach ($arResult['SECTIONS_LIST'] as $arSect) {
        echo '<div class="info-it-base-main" data-level="1"><span class="info-it-base-title" onclick="toggleNextSection(' . $arSect['ID'] . ', 1)">' . $arSect['NAME'] . '</span></div>';
        foreach ($arSect['SUB_SECTION'] as $arSectLevel2) {
            echo '<div class="info-it-base-level-2 hidden" data-sectionid="' . $arSectLevel2['IBLOCK_SECTION_ID'] . '" data-level="2"><span class="info-it-base-title" onclick="toggleNextSection(' . $arSectLevel2['ID'] . ', 2)">' . $arSectLevel2['NAME'] . '</span></div>';
            foreach ($arSectLevel2['SUB_SECTION'] as $arSectLevel3) {
                echo '<div class="info-it-base-level-3 hidden" data-sectionid="' . $arSectLevel3['IBLOCK_SECTION_ID'] . '" data-level="3"><span class="info-it-base-title" onclick="toggleNextSection(' . $arSectLevel3['ID'] . ', 3)">' . $arSectLevel3['NAME'] . '</span></div>';
                foreach ($arSectLevel3['SUB_SECTION'] as $arSectLevel4) {
                    echo '<div class="info-it-base-level-4 hidden" data-sectionid="' . $arSectLevel4['IBLOCK_SECTION_ID'] . '" data-level="4"><span class="info-it-base-title" onclick="toggleNextSection(' . $arSectLevel4['ID'] . ', 4)">' . $arSectLevel4['NAME'] . '</span></div>';


                    if (is_array($arResult['ELEMENTS_LIST'][$arSectLevel4['ID']])) {
                        foreach ($arResult['ELEMENTS_LIST'][$arSectLevel4['ID']] as $arEl4) {
                            echo '<div class="info-it-base-level-5-elem hidden" data-sectionid="' . $arSectLevel4['ID'] . '" data-level="4"><a href="' . $arEl4['DETAIL_PAGE_URL'] . '" target="_blank" class="info-it-base-title">' . $arEl4['NAME'] . '</a></div>';
                        }
                    }
                }

                if (is_array($arResult['ELEMENTS_LIST'][$arSectLevel3['ID']])) {
                    foreach ($arResult['ELEMENTS_LIST'][$arSectLevel3['ID']] as $arEl3) {
                        echo '<div class="info-it-base-level-4-elem hidden" data-sectionid="' . $arSectLevel3['ID'] . '" data-level="3"><a href="' . $arEl3['DETAIL_PAGE_URL'] . '" target="_blank" class="info-it-base-title">' . $arEl3['NAME'] . '</a></div>';
                    }
                }

            }
            if (is_array($arResult['ELEMENTS_LIST'][$arSectLevel2['ID']])) {
                foreach ($arResult['ELEMENTS_LIST'][$arSectLevel2['ID']] as $arEl2) {
                    echo '<div class="info-it-base-level-3-elem hidden" data-sectionid="' . $arSectLevel2['ID'] . '" data-level="2"><a href="' . $arEl2['DETAIL_PAGE_URL'] . '" target="_blank" class="info-it-base-title">' . $arEl2['NAME'] . '</a></div>';
                }
            }
        }
        if (is_array($arResult['ELEMENTS_LIST'][$arSect['ID']])) {
            foreach ($arResult['ELEMENTS_LIST'][$arSect['ID']] as $arEl1) {
                echo '<div class="info-it-base-level-2-elem hidden" data-sectionid="' . $arSect['ID'] . '" data-level="2"><a href="' . $arEl1['DETAIL_PAGE_URL'] . '" target="_blank" class="info-it-base-title">' . $arEl1['NAME'] . '</a></div>';
            }
        }
    }
    foreach ($arResult['ELEMENTS_LIST']['ROOT'] as $arRootEl) {
        echo '<div class="info-it-base-main-root"><a href="' . $arRootEl['DETAIL_PAGE_URL'] . '" target="_blank" class="info-it-base-title">' . $arRootEl['NAME'] . '</a></div>';
    }
    ?>


    <?php /*
    if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br />
<? endif; ?>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; */
    ?>
</div>