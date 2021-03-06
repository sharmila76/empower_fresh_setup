<?php

/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



$mod_strings = array (
   'LBL_MODULE_NAME' => 'База от знания' ,
   'LBL_MODULE_TITLE' => 'Материал' ,
   'LNK_NEW_ARTICLE' => 'Добавяне на материал' ,
   'LNK_KBDOCUMENT_LIST' => 'Списък с документи' ,
   'LBL_DOC_REV_HEADER' => 'Ревизии на документа' ,
   'LBL_SEARCH_FORM_TITLE' => 'Търсене в модул "Документи"' ,
   'LBL_KBDOC_TAGS' => 'Теми:' ,
   'LBL_KBDOC_BODY' => 'Съдържание:' ,
   'LBL_KBDOC_APPROVED_BY' => 'Одобрен от:' ,
   'LBL_KBDOC_ATTACHMENT' => 'Kbdoc_attahment' ,
   'LBL_KBDOC_ATTS_TITLE' => 'Зареждане на приложения:' ,
   'LBL_SEND_EMAIL' => 'Изпращане' ,
   'LBL_SELECT_TAG_BUTTON_TITLE' => 'Избери' ,
   'LBL_ATTACHMENTS' => 'Приложения:' ,
   'LBL_EMBEDED_IMAGES' => 'Вмъкнати изображения:' ,
   'LBL_SHOW_ARTICLE_DETAILS' => 'Показване на допълнителна информация' ,
   'LBL_HIDE_ARTICLE_DETAILS' => 'Скриване на допълнителна информация' ,
   'LBL_TAGS' => 'Теми:' ,
   'LBL_NOT_AN_ADMIN_USER' => 'Не е администратор' ,
   'LBL_NOT_A_VALID_FILE' => 'Невалиден файл' ,
   'LBL_SELECT_A_NODE_FROM_TREE' => 'Добавяне на нова тема' ,
   'LBL_SEARCH' => 'Търси' ,
   'LBL_NEW_TAG_NAME' => 'Заглавие на темата:' ,
   'LBL_ID' => 'ID' ,
   'LBL_KBDOCUMENT_ID' => 'Документ' ,
   'LBL_ARTICLE_TITLE' => 'Длъжност:' ,
   'LBL_ARTICLE_AUTHOR' => 'Автор:' ,
   'LBL_ARTICLE_APPROVED_BY' => 'Одобрен от:' ,
   'LBL_ARTICLE_BODY' => 'Съдържание:' ,
   'LBL_NAME' => 'Име на документа:' ,
   'LBL_DESCRIPTION' => 'Описание' ,
   'LBL_CATEGORY' => 'Категория' ,
   'LBL_SUBCATEGORY' => 'Подкатегория' ,
   'LBL_STATUS' => 'Статус' ,
   'LBL_CREATED_BY' => 'Създадено от' ,
   'LBL_DATE_ENTERED' => 'Въведено на' ,
   'LBL_DATEENTERED' => 'Създадено на:' ,
   'LBL_DATE_MODIFIED' => 'Модифицирано на' ,
   'LBL_DELETED' => 'Изтрити' ,
   'LBL_MODIFIED' => 'Модифицирано от' ,
   'LBL_MODIFIED_USER' => 'Модифицирано от' ,
   'LBL_CREATED' => 'Създадено от' ,
   'LBL_RELATED_DOCUMENT_ID' => 'Документи по темата' ,
   'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Ревизия на документа по темата' ,
   'LBL_IS_TEMPLATE' => 'е шаблон' ,
   'LBL_TEMPLATE_TYPE' => 'Тип на документа' ,
   'LBL_PARENT_TYPE' => 'Parent тип' ,
   'LBL_NUMBER' => 'LBL_NUMBER' ,
   'LBL_TEXT_BODY' => 'LBL_TEXT_BODY' ,
   'LBL_CREATED_BY_NAME' => 'LBL_CREATED_BY_NAME' ,
   'LBL_TAG_ID' => 'LBL_TAG_ID' ,
   'LBL_KBDOCUMENTS_KBTAGS_ID' => 'LBL_KBDOCUMENTS_KBTAGS_ID' ,
   'LBL_REVISION_NAME' => 'Номер на ревизията' ,
   'LBL_KBDOCUMENT_REVISION_NUMBER' => 'Номер на ревизия на документа' ,
   'LBL_MIME' => 'Mime тип' ,
   'LBL_REVISION' => 'Ревизия' ,
   'LBL_DOCUMENT' => 'Още документи по темата' ,
   'LBL_LATEST_REVISION' => 'Последна ревизия' ,
   'LBL_LATEST_REVISION_NAME' => 'Име на последната ревизия' ,
   'LBL_SELECTED_REVISION_NAME' => 'Име на маркираната ревизия' ,
   'LBL_CHANGE_LOG' => 'Дневник на промените за записа' ,
   'LBL_ACTIVE_DATE' => 'Публикувано на' ,
   'LBL_EXPIRATION_DATE' => 'Валидно до' ,
   'LBL_FILE_EXTENSION' => 'Разширение на файла' ,
   'LBL_KNOWLEDGE_BASE_SEARCH' => 'База от знания' ,
   'LBL_KNOWLEDGE_BASE_ADMIN' => 'Администриране на базата от знания' ,
   'LBL_KNOWLEDGE_BASE_ADMIN_MENU' => 'Администриране на базата от знания' ,
   'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Некласифициран' ,
   'LBL_DOC_NAME' => 'Име на документа:' ,
   'LBL_FILENAME' => 'Име на файла:' ,
   'LBL_DOC_VERSION' => 'Версия:' ,
   'LBL_CATEGORY_VALUE' => 'Категория:' ,
   'LBL_SUBCATEGORY_VALUE' => 'Подкатегория:' ,
   'LBL_DOC_STATUS' => 'Статус:' ,
   'LBL_LAST_REV_CREATOR' => 'Създадена от:' ,
   'LBL_LAST_REV_DATE' => 'Дата на ревизията:' ,
   'LBL_DOWNNLOAD_FILE' => 'Приложения:' ,
   'LBL_DET_RELATED_DOCUMENT' => 'Документ по темата:' ,
   'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Ревизии на документи по темата:' ,
   'LBL_DET_IS_TEMPLATE' => 'Шаблон? :' ,
   'LBL_DET_TEMPLATE_TYPE' => 'Тип на документа:' ,
   'LBL_IS_EXTERNAL_ARTICLE' => 'Външен материал? :' ,
   'LBL_SHOW_TAGS' => 'Показване на други теми' ,
   'LBL_HIDE_TAGS' => 'Скриване на теми' ,
   'LBL_TEAM' => 'Екип:' ,
   'LBL_DOC_DESCRIPTION' => 'Описание:' ,
   'LBL_KBDOC_SUBJECT' => 'Относно:' ,
   'LBL_DOC_ACTIVE_DATE' => 'Публикуван на:' ,
   'LBL_DOC_EXP_DATE' => 'Валиден до:' ,
   'LBL_LIST_ARTICLES' => 'Материали' ,
   'LBL_LIST_FORM_TITLE' => 'Списък с документи' ,
   'LBL_LIST_DOCUMENT' => 'Документ' ,
   'LBL_LIST_CATEGORY' => 'Категория' ,
   'LBL_LIST_SUBCATEGORY' => 'Подкатегория' ,
   'LBL_LIST_REVISION' => 'Ревизия' ,
   'LBL_LIST_LAST_REV_CREATOR' => 'Публикувана от' ,
   'LBL_LIST_LAST_REV_DATE' => 'Дата на ревизията' ,
   'LBL_LIST_VIEW_DOCUMENT' => 'Разгледай' ,
   'LBL_LIST_DOWNLOAD' => 'Изтегли' ,
   'LBL_LIST_ACTIVE_DATE' => 'Публикувано на' ,
   'LBL_LIST_EXP_DATE' => 'Валидно до' ,
   'LBL_LIST_STATUS' => 'Статус' ,
   'LBL_ARTICLE_AUTHOR_LIST' => 'Автор' ,
   'LBL_LIST_MOST_VIEWED' => 'Най-разглеждани материали' ,
   'LBL_LIST_MOST_RECENT' => 'Последно добавени материали' ,
   'LBL_SF_DOCUMENT' => 'Име на документа:' ,
   'LBL_SF_CATEGORY' => 'Категория:' ,
   'LBL_SF_SUBCATEGORY' => 'Подкатегория:' ,
   'LBL_SF_ACTIVE_DATE' => 'Публикуван на:' ,
   'LBL_SF_EXP_DATE' => 'Валиден до:' ,
   'DEF_CREATE_LOG' => 'Създаден документ' ,
   'LBL_TAB_SEARCH' => 'Търси' ,
   'LBL_TAB_BROWSE' => 'Търси' ,
   'LBL_TAB_ADVANCED' => 'Разширено търсене' ,
   'LBL_MENU_FTS' => 'Търсене по цели фрази' ,
   'LBL_FTS_EMPTY_STRING' => 'Cannot perform full text search on an empty string' ,
   'LBL_SEARCH_WITHIN' => 'Търсене в:' ,
   'LBL_CONTAINING_THESE_WORDS' => 'С включени думи:' ,
   'LBL_EXCLUDING_THESE_WORDS' => 'Без следните думи:' ,
   'LBL_UNDER_THIS_TAG' => 'Включени в тема:' ,
   'LBL_PUBLISHED' => 'Публикуван:' ,
   'LBL_EXPIRES' => 'Expires:' ,
   'LBL_TIMES_VIEWED' => 'Показване на:' ,
   'LBL_SAVE_SEARCH_AS' => 'Съхрани като:' ,
   'LBL_SAVE_SEARCH_AS_HELP' => 'Въведените от Вас записи ще бъдат съхранени като съхранени критерии за търсене за модул База от знания.' ,
   'LBL_PREVIOUS_SAVED_SEARCH' => 'Предишни съхранени критерии за търсене:' ,
   'LBL_PREVIOUS_SAVED_SEARCH_HELP' => 'Редактиране или изтриване на съществуващи съхранени критерии за търсене.' ,
   'LBL_UPDATE' => 'Актуализирай' ,
   'LBL_DELETE' => 'Изтриване' ,
   'LBL_SHOW_OPTIONS' => 'Допълнителни опции' ,
   'LBL_AND' => 'и' ,
   'LBL_CLEAR' => 'Изчисти' ,
   'LBL_LIST_KBDOC_APPROVER_NAME' => 'Одобрен от' ,
   'LBL_LIST_VIEWING_FREQUENCY' => 'Брой разглеждания' ,
   'LBL_ARTICLE_PREVEW_UNAVAILABLE_NO_DOCUMENT' => 'Предварителен преглед на документа не може да се осъществи, документът не бе намерен.' ,
   'LBL_ARTICLE_PREVEW_UNAVAILABLE_NO_CONTENT' => 'Предварителен преглед на документа не може да се осъществи, документът е с празно съдържание.' ,
   'LBL_UNTAGGED_ARTICLES_NODE' => 'Други материали' ,
   'LBL_TOP_TEN_LIST_TITLE' => '10 най-разглеждани материала' ,
   'LBL_SHOW_SYNTAX_HELP' => 'Syntax Help' ,
   'LBL_MISMATCH_QUOTES_ERR' => 'Вашата заявка няма да бъде изпълнена.  При наличие на отварящи кавички е необходимо те да се допълват със затварящи такива.  При търсене на string с кавички, въведете backslash (")' ,
   'LBL_SYNTAX_CHEAT_SHEET' => '<B>Изисквания при генериране на заявки:</b><P>
        <ol>
<li>Знакът плюс (+) задава условие за задължително наличие на думата след знака в заявката за търсене.</li>
<li>Знакът минус (-) задава условие за изключване на думата след знака в заявката за търсене.  Знакът минус (-) не е необходим при въвеждане на стойности в полето "Без следните думи" при разширено търсене.</li>
<li>Думи, включени в кавички ("пример1 пример2") се приемат като комбинирано условие за търсене. За успешно изпълнение на заявката е необходимо кавичките да бъдат затворени.<br>За търсене на кавички, се използва backslash-quote (") .</li>
<li>Знакът кавичка (\') will be searched on as-is, and not as a grouping.</li></ol>

        </p>

        <p><b>Пример: </b><br><br>
        Заявката за търсене на всички материали за "Sugar" или "CRM" с включени думи "Knowledge Base" и "cool", но без думите "demo" или "past tense", се визуализира по следния начин:<br>&nbsp;&nbsp;&nbsp;&nbsp;Sugar CRM +"Knowledge Base" +cool -demo -"Past Tense"</p><br>

        <p><b>Бележки: </b><br>
<ol><li>Case does not matter.</li>
<li>Интервали и запетаи се приемат за разграничители в равна степен.</li>
<li>Не се слагат интервали между знаците плюс (+) или минус (-) и думите, за които се отнасят.</li></ol>
</p>' ,
   'LBL_CHILD_TAG_IN_TREE_HOVER' => 'Подтема' ,
   'LBL_CHILD_TAGS_IN_TREE_HOVER' => 'Подтеми' ,
   'LBL_ARTICLE_IN_TREE_HOVER' => 'Материал' ,
   'LBL_ARTICLES_IN_TREE_HOVER' => 'Материали' ,
   'LBL_THIS_TAG_CONTAINS_TREE_HOVER' => 'Темата съдържа' ,
   'ERR_DOC_NAME' => 'Име на документа' ,
   'ERR_DOC_ACTIVE_DATE' => 'Дата на публикуване' ,
   'ERR_DOC_EXP_DATE' => 'Валидно до' ,
   'ERR_FILENAME' => 'Име на файла' ,
   'ERR_DOC_VERSION' => 'Версия на документа' ,
   'ERR_DELETE_CONFIRM' => 'Искате ли да изтриете тази ревизия на документа?' ,
   'ERR_DELETE_LATEST_VERSION' => 'Нямате съответните права за изтриване на последната ревизия на документа.' ,
   'LNK_NEW_MAIL_MERGE' => 'Сливане на писма' ,
   'LBL_MAIL_MERGE_DOCUMENT' => 'Шаблон за сливане на писма:' ,
   'LBL_TREE_TITLE' => 'Документи' ,
   'LBL_LIST_DOCUMENT_NAME' => 'Име на документа' ,
   'LBL_CONTRACT_NAME' => 'Име на договора:' ,
   'LBL_LIST_IS_TEMPLATE' => 'Шаблон?' ,
   'LBL_LIST_TEMPLATE_TYPE' => 'Тип на документа' ,
   'LBL_LIST_SELECTED_REVISION' => 'Маркирани ревизии' ,
   'LBL_LIST_LATEST_REVISION' => 'Последна ревизия' ,
   'LBL_CASES_SUBPANEL_TITLE' => 'Казуси по темата' ,
   'LBL_EMAILS_SUBPANEL_TITLE' => 'Електронни писма по темата' ,
   'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Договори по темата' ,
   'LBL_LAST_REV_CREATE_DATE' => 'Дата на последната ревизия' ,
   'LBL_KEYWORDS' => 'Ключови думи:' ,
   'LBL_CASES' => 'Казуси' ,
   'LBL_EMAILS' => 'Електронна поща' ,
   'LBL_DEFAULT_ADMIN_MESSAGE' => 'Изберете действие за изпълнение от падащото меню' ,
   'LBL_SELECT_PARENT_TAG_MESSAGE' => 'Изберете parent тема от структурата с теми' ,
   'LBL_SELECT_TAG_TO_BE_DELETED_FROM_TREE' => 'Изберете тема(и) за изтриване от структурата с теми' ,
   'LBL_SELECT_TAG_TO_BE_RENAMED_FROM_TREE' => 'Изберете тема(и) за преименуване от структурата с теми' ,
   'LBL_TAG_ALREADY_EXISTS' => 'Темата вече съществува' ,
   'LBL_TYPE_THE_NEW_TAG_NAME' => 'Въведете заглавие на новата тема' ,
   'LBL_SAVING_THE_TAG' => 'Запазване на темата...' ,
   'LBL_CREATING_NEW_TAG' => 'Добавяне на нова тема...' ,
   'LBL_TAGS_ROOT_LABEL' => 'Теми' ,
   'LBL_FAQ_TAG_NOT_RENAME_MESSAGE' => 'FAQs тема не може да бъде преименувана' ,
   'LBL_SELECT_ARTICLES_TO_BE_MOVED_TO_OTHER_TAG' => 'Изберете материали ' ,
   'LBL_SELECT_ARTICLES_TO_APPLY_TAGS' => 'Изберете материали за включване към теми' ,
   'LBL_SELECT_ARTICLES_TO_DELETE' => 'Изберете материали ' ,
   'LBL_SELECT_TAGS_TO_DELETE' => 'Изберете теми за изтриване' ,
   'LBL_SELECT_A_TAG_FROM_TREE' => 'Изберете тема от структурата с теми' ,
   'LBL_SELECT_TAGS_FROM_TREE' => 'Изберете теми от структурата с теми' ,
   'LBL_MOVING_ARTICLES_TO_TAG' => 'Преместване на материали към темата...' ,
   'LBL_APPLYING_TAGS_TO_ARTICLES' => 'Включване на материали към темата ...' ,
   'LBL_ROOT_TAG_MESSAGE' => 'Root tag cannot be selected/linked to article' ,
   'LBL_ROOT_TAG_CAN_NOT_BE_RENAMED' => 'Базовата тема не може да бъде преименувана' ,
   'LBL_TYPE_NEW_NODE_NAME' => 'Моля, въведете заглавие на тема' ,
   'LBL_SOURCE_AND_TARGET_TAGS_ARE_SAME' => 'Първоначалната и исканата тема за включване на материала съвпадат' ,
   'LBL_DELETE_TAG' => 'Изтрий тема' ,
   'LBL_SELECT_TAG' => 'Избери тема' ,
   'LBL_APPLY_TAG' => 'Включи към тема' ,
   'LBL_MOVE' => 'Премести' ,
   'LBL_LAUNCHING_TAG_BROWSING' => 'Launching Tag Browsing ...' ,
   'LBL_THERE_WAS_AN_ERROR_HANDLING_TAGS' => 'Намерена грешка при изпълнение на заявката.' ,
   'LBL_ERROR_NOT_A_FILE_INPUT_ELEMENT' => 'Грешка: Not a file input element' ,
   'LBL_CREATE_NEW_TAG' => 'Добавяне на нова тема' ,
   'LBL_SEARCH_TAG' => 'Търси' ,
   'LBL_TAG_NAME' => 'Име на темата:' ,
   'LBL_TYPE_TAG_NAME_TO_SEARCH' => 'Въведете заглавие на темата за търсене' ,
   'LBL_KB_NOTIFICATION' => 'Документът е публикуван' ,
   'LBL_KB_PUBLISHED_REQUEST' => 'има документ за одобрение и публикация от Ваша страна.' ,
   'LBL_KB_STATUS_BACK_TO_DRAFT' => 'Статусът на документа е променен на чернови' ,
   'LBL_CONTRACTS' => 'Договори' ,
   'LBL_SELECT_PARENT_TREE_NOTICE' => 'Изберете свързана тема от структурата ' ,
   'LBL_CLICK_APPLY_TAG' => 'Click Apply Tag' ,
   'LBL_HEAD_TAGS' => 'Теми' );

?>