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




$mod_strings= array (
'LBL_MODULE_NAME'                                  => 'KBDocuments',
'LBL_MODULE_TITLE'                                 => 'Wissensbasis Artikel',
'LNK_NEW_ARTICLE'                                  => 'Artikel erstellen',
'LNK_KBDOCUMENT_LIST'                              => 'Dokumente Liste',
'LBL_DOC_REV_HEADER'                               => 'Dokument Versionen',
'LBL_SEARCH_FORM_TITLE'                            => 'Dokumente Suche',
'LBL_KBDOC_TAGS'                                   => 'Tags:',
'LBL_KBDOC_BODY'                                   => 'Text:',
'LBL_KBDOC_APPROVED_BY'                            => 'Genehmigt von:',
'LBL_KBDOC_ATTACHMENT'                             => 'Kbdoc_attachment',
'LBL_KBDOC_ATTS_TITLE'                             => 'Anhänge herunterladen:',
'LBL_SEND_EMAIL'                                   => 'E-Mail senden',
'LBL_SELECT_TAG_BUTTON_TITLE'                      => 'Auswählen',
'LBL_ATTACHMENTS'                                  => 'Anhänge:',
'LBL_EMBEDED_IMAGES'                               => 'Eingebettete Bilder:',
'LBL_SHOW_ARTICLE_DETAILS'                         => 'Weitere Details zeigen',
'LBL_HIDE_ARTICLE_DETAILS'                         => 'Details verstecken',
'LBL_TAGS'                                         => 'Tags:',
'LBL_NOT_AN_ADMIN_USER'                            => 'Kein Admin Benutzer',
'LBL_NOT_A_VALID_FILE'                             => 'Keine gültige Datei',
'LBL_SELECT_A_NODE_FROM_TREE'                      => 'Neuen Tag erstellen',

'LBL_SELECT_A_NODE_FROM_TREE' => 'Einen neuen Tag erstellen',
'LBL_SEARCH'  =>'Suchen',
'LBL_NEW_TAG_NAME' => 'Neuer Tag Name:',
'LBL_ID' => 'ID',

'LBL_KBDOCUMENT_ID'                                => 'Dokument ID',
'LBL_ARTICLE_TITLE'                                => 'Titel:',
'LBL_ARTICLE_AUTHOR'                               => 'Autor:',
'LBL_ARTICLE_APPROVED_BY'                          => 'Genehmigt von:',
'LBL_ARTICLE_BODY'                                 => 'Artikel Inhalt:',
'LBL_NAME'                                         => 'Dokument Name:',
'LBL_DESCRIPTION'                                  => 'Beschreibung',
'LBL_CATEGORY'                                     => 'Kategorie',
'LBL_SUBCATEGORY'                                  => 'Unterkategorie',
'LBL_STATUS'                                       => 'Status',
'LBL_CREATED_BY'                                   => 'Erstellt von:',
'LBL_DATE_ENTERED'                                 => 'Datum erstellt',
'LBL_DATEENTERED'                                  => 'Erstellt:',
'LBL_DATE_MODIFIED'                                => 'Geändert am',
'LBL_DELETED'                                      => 'Gelöscht',
'LBL_MODIFIED'                                     => 'Geändert von ID',
'LBL_MODIFIED_USER'                                => 'Geändert von',
'LBL_CREATED'                                      => 'Erstellt von:',
'LBL_RELATED_DOCUMENT_ID'                          => 'Verknüpfte Dokument ID',
'LBL_RELATED_DOCUMENT_REVISION_ID'                 => 'Verknüpfte Dokumentversions ID',
'LBL_IS_TEMPLATE'                                  => 'Ist ein Template',
'LBL_TEMPLATE_TYPE'                                => 'Dokumententyp',
'LBL_PARENT_TYPE'                                  => 'Eltern-Typ',
'LBL_NUMBER'                                       => 'Nummer',
'LBL_TEXT_BODY'                                    => 'Textkörper',
'LBL_CREATED_BY_NAME'                              => 'LBL_CREATED_BY_NAME',
'LBL_TAG_ID'                                       => 'LBL_TAG_ID',
'LBL_KBDOCUMENTS_KBTAGS_ID'                        => 'LBL_KBDOCUMENTS_KBTAGS_ID',
'LBL_REVISION_NAME'                                => 'Versionsnummer',
'LBL_KBDOCUMENT_REVISION_NUMBER'                   => 'KBDocument Versions Nummer',
'LBL_MIME'                                         => 'Mime-Typ',
'LBL_REVISION'                                     => 'Version',
'LBL_DOCUMENT'                                     => 'Verknüpftes Dokument',
'LBL_LATEST_REVISION'                              => 'Letzte Versions ID',

'LBL_LATEST_REVISION' => 'Latest Revision Id',
'LBL_LATEST_REVISION_NAME' => 'Latest Revision Name',
'LBL_SELECTED_REVISION_NAME' => 'Selected Revision Name',


'LBL_CHANGE_LOG'                                   => 'Änderungs-Log:',
'LBL_ACTIVE_DATE'                                  => 'Veröffentlichungsdatum',
'LBL_EXPIRATION_DATE'                              => 'Ablaufdatum',
'LBL_FILE_EXTENSION'                               => 'Dateiendung',

'LBL_KBDOC_TAGS' => 'Dokument Tags:',
'LBL_KBDOC_BODY' => 'Dokument Body:',
'LBL_KBDOC_APPROVED_BY' =>'Bestätigt vom:',
'LBL_KBDOC_ATTACHMENT' =>'Kbdoc_attahment',
'LBL_KBDOC_ATTS_TITLE' =>'Anhänge downloaden:',


'LBL_KNOWLEDGE_BASE_SEARCH'                        => 'WISSENSBASIS',
'LBL_KNOWLEDGE_BASE_ADMIN'                         => 'WISSENSBASIS ADMIN',
'LBL_KNOWLEDGE_BASE_ADMIN_MENU'                    => 'Wissensbasis Admin',
'LBL_CAT_OR_SUBCAT_UNSPEC'                         => 'Unspezifisch',

'LBL_KBDOC_TAGS' => 'Tags:',
'LBL_KBDOC_BODY' => 'Body:',
'LBL_KBDOC_APPROVED_BY' =>'Bestätigt vom:',
'LBL_KBDOC_ATTACHMENT' =>'Kbdoc_attahment',
'LBL_KBDOC_ATTS_TITLE' =>'Anhänge downloaden:',


'LBL_DOC_NAME'                                     => 'Dokument Name:',
'LBL_FILENAME'                                     => 'Dateiname:',
'LBL_DOC_VERSION'                                  => 'Version:',
'LBL_CATEGORY_VALUE'                               => 'Kategorie',
'LBL_SUBCATEGORY_VALUE'                            => 'Unterkategorie:',
'LBL_DOC_STATUS'                                   => 'Status:',
'LBL_LAST_REV_CREATOR'                             => 'Version erstellt von:',
'LBL_LAST_REV_DATE'                                => 'Versionsdatum:',
'LBL_DOWNNLOAD_FILE'                               => 'Anhänge:',
'LBL_DET_RELATED_DOCUMENT'                         => 'Verknüpftes Dokument:',
'LBL_DET_RELATED_DOCUMENT_VERSION'                 => 'Verknüpfte Dokumentversion:',
'LBL_DET_IS_TEMPLATE'                              => 'Vorlage?:',
'LBL_DET_TEMPLATE_TYPE'                            => 'Dokumententyp:',
'LBL_IS_EXTERNAL_ARTICLE'                          => 'Externer Artikel? :',
'LBL_SHOW_TAGS'                                    => 'Zeige mehr Tags',
'LBL_HIDE_TAGS'                                    => 'Tags verbergen',
'LBL_TEAM'                                         => 'Team:',
'LBL_DOC_DESCRIPTION'                              => 'Beschreibung:',
'LBL_KBDOC_SUBJECT'                                => 'Betreff:',
'LBL_DOC_ACTIVE_DATE'                              => 'Veröffentlichungsdatum:',
'LBL_DOC_EXP_DATE'                                 => 'Ablaufdatum:',
'LBL_LIST_ARTICLES'                                => 'Artikel',
'LBL_LIST_FORM_TITLE'                              => 'Dokumente Liste',
'LBL_LIST_DOCUMENT'                                => 'Dokument',
'LBL_LIST_CATEGORY'                                => 'Kategorie',
'LBL_LIST_SUBCATEGORY'                             => 'Unterkategorie',
'LBL_LIST_REVISION'                                => 'Version',
'LBL_LIST_LAST_REV_CREATOR'                        => 'Veröffentlicht von',
'LBL_LIST_LAST_REV_DATE'                           => 'Versionsdatum',
'LBL_LIST_VIEW_DOCUMENT'                           => 'Ansicht',
'LBL_LIST_DOWNLOAD'                                => 'Herunterladen',
'LBL_LIST_ACTIVE_DATE'                             => 'Veröffentlichungsdatum',
'LBL_LIST_EXP_DATE'                                => 'Ablaufdatum',
'LBL_LIST_STATUS'                                  => 'Status',
'LBL_ARTICLE_AUTHOR_LIST'                          => 'Autor',
'LBL_LIST_MOST_VIEWED'                             => 'Most Viewed Articles',
'LBL_LIST_MOST_RECENT'                             => 'Most Recent Articles',
'LBL_SF_DOCUMENT'                                  => 'Dokument Name:',
'LBL_SF_CATEGORY'                                  => 'Kategorie',
'LBL_SF_SUBCATEGORY'                               => 'Unterkategorie:',
'LBL_SF_ACTIVE_DATE'                               => 'Veröffentlichungsdatum:',
'LBL_SF_EXP_DATE'                                  => 'Ablaufdatum:',
'DEF_CREATE_LOG'                                   => 'Dokument erstellt:',
'LBL_TAB_SEARCH'                                   => 'Suchen',
'LBL_TAB_BROWSE'                                   => 'Durchsuchen',
'LBL_TAB_ADVANCED'                                 => 'Erweitert',
'LBL_MENU_FTS'                                     => 'Volltextsuche',
'LBL_FTS_EMPTY_STRING'                             => 'Volltextsuche mit einem leeren Begriff ist nicht möglich',
'LBL_SEARCH_WITHIN'                                => 'Suche in:',
'LBL_CONTAINING_THESE_WORDS'                       => 'Enthält diese Worte:',
'LBL_EXCLUDING_THESE_WORDS'                        => 'Außer diese Worte:',
'LBL_UNDER_THIS_TAG'                               => 'Mit diesem Tag:',
'LBL_PUBLISHED'                                    => 'Veröffentlicht:',
'LBL_EXPIRES'                                      => 'Endet:',
'LBL_TIMES_VIEWED'                                 => 'Betrachtungshäufigkeit:',
'LBL_SAVE_SEARCH_AS'                               => 'Diese Suche speichern als:',
'LBL_SAVE_SEARCH_AS_HELP'                          => 'Dies speichert Ihre definierten Einträge als Gespeicherte Suche Filter für die Wissensbasis.',
'LBL_PREVIOUS_SAVED_SEARCH'                        => 'Früher gespeicherte Suchen:',
'LBL_PREVIOUS_SAVED_SEARCH_HELP'                   => 'Eine bestehende Gespeicherte Suche bearbeiten oder löschen.',
'LBL_UPDATE'                                       => 'Aktualisieren',
'LBL_DELETE'                                       => 'Löschen',
'LBL_SHOW_OPTIONS'                                 => 'Weitere Optionen',
'LBL_AND'                                          => 'und',
'LBL_CLEAR'                                        => 'Leeren',
'LBL_LIST_KBDOC_APPROVER_NAME'                     => 'Autorisiert von',
'LBL_LIST_VIEWING_FREQUENCY'                       => 'Häufigkeit',
'LBL_ARTICLE_PREVEW_UNAVAILABLE_NO_DOCUMENT'       => 'Vorschau nicht verfügbar, Dokument Datensatz nicht gefunden.',
'LBL_ARTICLE_PREVEW_UNAVAILABLE_NO_CONTENT'        => 'Vorschau nicht verfügbar, Dokument existiert aber es wurde noch kein Inhalt generiert.',
'LBL_UNTAGGED_ARTICLES_NODE'                       => 'Unge&#039;taggte&#039; Artikel',
'LBL_TOP_TEN_LIST_TITLE'                           => 'Die 10 am meisten betrachteten Artikel',
'LBL_SHOW_SYNTAX_HELP'                             => 'Syntax Hilfe',
'LBL_MISMATCH_QUOTES_ERR'                          => 'Ihre Abfrage wird so nicht funktionieren. Für jedes öffnende doppelte Hochkomma muss auch ein schließendes existieren. Wenn Sie nach einer Zeichenkette suchen wollen die ein Hochkomma enthält, dann stellen Sie einen Backslash voran (\&quot;)',
'LBL_SYNTAX_CHEAT_SHEET'                           => '&lt;B&gt;Abfrage Syntax Hilfe:&lt;/b&gt;&lt;P&gt; &lt;ol&gt; &lt;li&gt;Das Plus (+) Zeichen bedeutet, dass die Resultate diesen Begriff beinhalten müssen.&lt;/li&gt; &lt;li&gt;Das Minus (-) Zeichen bedeutet, dass die Resultate diesen Begriff nicht beinhalten sollen. Das Minus (-) Zeichen ist nicht notwendig, wenn Sie das Textfeld für &lt;br&gt;auszuschließende Worte verwenden.&lt;/li&gt; &lt;li&gt;Mehrere Wörter in doppelten Hochkommas  (&quot;Beispiel1 Beispiel2&quot;) werden als ein Suchbegriff betrachtet. Allerdings muss es ein öffnendes und ein schließendes Hochkomma geben, &lt;br&gt;ansonsten wird die Suche nicht durchgeführt. Wenn Sie nach einem Hochkomma als Text suchen wollen, stellen Sie einen Backslash voran (&quot;)&lt;/li&gt; &lt;li&gt;Ein einfaches Hochkomma (&#039;) wird nicht als Gruppierungszeichen verwendet sondern als ganz normales Zeichen.&lt;/li&gt;&lt;/ol&gt; &lt;/p&gt; &lt;p&gt;&lt;b&gt;Beispiel: &lt;/b&gt;&lt;br&gt;&lt;br&gt; Um nach allen Artikeln zu suchen die &quot;Sugar&quot; oder &quot;CRM&quot; enthalten, und die die Wörter &quot;Wissensbasis&quot; und &quot;cool&quot; enthalten sollen, allerdings nicht &quot;Demo&quot; oder &quot;Vergangenheit&quot; geben &lt;br&gt;Sie folgendes ein: Sugar CRM +&quot;Wissensbasis&quot; +cool -Demo -&quot;Vergangenheit&quot;&lt;br&gt;&lt;br&gt;&lt;B&gt;Bemerkung:&lt;/b&gt;&lt;P&gt; &lt;ol&gt; &lt;li&gt;Groß- und Kleinschreibung macht keinen Unterschied.&lt;/li&gt; &lt;li&gt;Sowohl Kommas als auch Leerzeichen trennen Begriffe&lt;/li&gt; &lt;li&gt;Bitte kein Leerzeichen zwischen (+) bzw (-) und dem Suchwort.&lt;/li&gt;',
'LBL_CHILD_TAG_IN_TREE_HOVER'                      => 'Untergeordneter Tag',
'LBL_CHILD_TAGS_IN_TREE_HOVER'                     => 'Untergeordnete Tags',
'LBL_ARTICLE_IN_TREE_HOVER'                        => 'Artikel',
'LBL_ARTICLES_IN_TREE_HOVER'                       => 'Artikel',
'LBL_THIS_TAG_CONTAINS_TREE_HOVER'                 => 'Dieser Tag beinhaltet',
'ERR_DOC_NAME'                                     => 'Dokument Name',
'ERR_DOC_ACTIVE_DATE'                              => 'Veröffentlichungsdatum',
'ERR_DOC_EXP_DATE'                                 => 'Ablaufdatum',
'ERR_FILENAME'                                     => 'Dateiname',
'ERR_DOC_VERSION'                                  => 'Dokument-Version',
'ERR_DELETE_CONFIRM'                               => 'Möchten Sie diese Dokumentversion löschen?',
'ERR_DELETE_LATEST_VERSION'                        => 'Die letzte Version eines Dokuments kann nicht gelöscht werden.',
'LNK_NEW_MAIL_MERGE'                               => 'Serienbrief',
'LBL_MAIL_MERGE_DOCUMENT'                          => 'Serienbrief-Vorlage:',
'LBL_TREE_TITLE'                                   => 'Dokumente',
'LBL_LIST_DOCUMENT_NAME'                           => 'Dokument Name',
'LBL_CONTRACT_NAME'                                => 'Vertragsname:',
'LBL_LIST_IS_TEMPLATE'                             => 'Vorlage?',
'LBL_LIST_TEMPLATE_TYPE'                           => 'Dokumententyp',
'LBL_LIST_SELECTED_REVISION'                       => 'Gewählte Version',
'LBL_LIST_LATEST_REVISION'                         => 'Letzte Version',
'LBL_CASES_SUBPANEL_TITLE'                         => 'Verknüpfte Fälle',
'LBL_EMAILS_SUBPANEL_TITLE'                        => 'Verknüpfte E-Mails',
'LBL_CONTRACTS_SUBPANEL_TITLE'                     => 'Verknüpfte Kontakte',
'LBL_LAST_REV_CREATE_DATE'                         => 'Erstellungsdatum Letzte Version',
'LBL_KEYWORDS'                                     => 'Schlüsselwörter:',
'LBL_CASES'                                        => 'Fälle',
'LBL_EMAILS'                                       => 'E-Mails',
'LBL_DEFAULT_ADMIN_MESSAGE'                        => 'Wählen Sie eine Aktion aus der Auswahlliste',
'LBL_SELECT_PARENT_TAG_MESSAGE'                    => 'Wählen Sie den übergeordneten Tag aus dem Baum',
'LBL_SELECT_TAG_TO_BE_DELETED_FROM_TREE'           => 'Wählen Sie Tag(s) die aus dem Baum gelöscht werden sollen',
'LBL_SELECT_TAG_TO_BE_RENAMED_FROM_TREE'           => 'Wählen Sie die Tag(s) im Baum, die umbenannt werden sollen',
'LBL_TAG_ALREADY_EXISTS'                           => 'Tag existiert bereits',
'LBL_TYPE_THE_NEW_TAG_NAME'                        => 'Tippen Sie den neuen Tag Namen',
'LBL_SAVING_THE_TAG'                               => 'Speichere den Tag...',
'LBL_CREATING_NEW_TAG'                             => 'Erstelle neuen Tag...',
'LBL_TAGS_ROOT_LABEL'                              => 'Tags',
'LBL_FAQ_TAG_NOT_RENAME_MESSAGE'                   => 'FAQs Tag kann nicht umbenannt werden',
'LBL_SELECT_ARTICLES_TO_BE_MOVED_TO_OTHER_TAG'     => 'Zuerst Artikel auswählen',
'LBL_SELECT_ARTICLES_TO_APPLY_TAGS'                => 'Wählen Sie Artikel für Tags',
'LBL_SELECT_ARTICLES_TO_DELETE'                    => 'Zuerst Artikel auswählen',
'LBL_SELECT_TAGS_TO_DELETE'                        => 'Wählen Sie die Tags, die gelöscht werden sollen',
'LBL_SELECT_A_TAG_FROM_TREE'                       => 'Wählen Sie einen Tag aus der Baumstruktur',
'LBL_SELECT_TAGS_FROM_TREE'                        => 'Wählen Sie Tags aus der Baumstruktur',
'LBL_MOVING_ARTICLES_TO_TAG'                       => 'Artikel zu Tag verschieben...',
'LBL_APPLYING_TAGS_TO_ARTICLES'                    => 'Tags auf Artikel anwenden...',
'LBL_ROOT_TAG_MESSAGE'                             => 'Root Tag kann nicht gewählt / mit einem Artikel verbunden werden',
'LBL_ROOT_TAG_CAN_NOT_BE_RENAMED'                  => 'Root Tag kann nicht umbenannt werden',
'LBL_SOURCE_AND_TARGET_TAGS_ARE_SAME'              => 'Quell- und Zieltags sind ident',
'LBL_DELETE_TAG'                                   => 'Tag löschen',
'LBL_SELECT_TAG'                                   => 'Tag auswählen',
'LBL_APPLY_TAG'                                    => 'Tag anwenden',
'LBL_MOVE'                                         => 'Verschieben',
'LBL_LAUNCHING_TAG_BROWSING'                       => 'Tag Browsing starten ...',
'LBL_THERE_WAS_AN_ERROR_HANDLING_TAGS'             => 'Fehler bei der Anfrage nach Tags.',
'LBL_ERROR_NOT_A_FILE_INPUT_ELEMENT'               => 'Fehler: Kein Datei Eingabeelement',
'LBL_CREATE_NEW_TAG'                               => 'Neuen Tag erstellen',
'LBL_SEARCH_TAG'                                   => 'Suchen',
'LBL_TAG_NAME'                                     => 'Tag Name:',
'LBL_TYPE_TAG_NAME_TO_SEARCH'                      => 'Geben Sie den Tag Namen für die Suche ein',
'LBL_TYPE_TAG_NAME_TO_SEARCH' => 'Type tag name to be searched',


'LBL_KB_NOTIFICATION'                              => 'Dokument wurde veröffentlicht',
'LBL_KB_PUBLISHED_REQUEST'                         => 'hat Ihnen ein Dokument zwecks Genehmigung und Veröffentlichung zugewiesen.',
'LBL_KB_STATUS_BACK_TO_DRAFT'                      => 'Dokumentstatus wurde auf &#039;Entwurf&#039; zurückgeändert',

'LBL_CONTRACTS' => 'Verträge',
'LBL_SELECT_PARENT_TREE_NOTICE' => 'Select the parent tag, from here',
'LBL_CLICK_APPLY_TAG' => 'Click Apply Tag',		
'LBL_HEAD_TAGS' => 'Tags',
);?>
