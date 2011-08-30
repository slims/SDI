<?php
/**
 *
 * SLiMS Drupal integration script
 *
 * Copyright (C) 2011 Arie Nugraha (dicarve@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

require_once 'slims/drupalslims.inc.php';

// include css
echo '<link rel="stylesheet" type="text/css" href="slims/slims.css"></link>';

// show record detail
if (isset($_GET['recid']) && (integer)$_GET['recid'] > 0) {
    // record ID
    $recid = (integer)$_GET['recid'];
    echo slims_detail($recid);
} else {
    // show biblio list
    $keywords = '';
    if (isset($_GET['keywords']) && trim($_GET['keywords']) != '') {
        $keywords = trim($_GET['keywords']);
    }
    // advanced search
    if (isset($_GET['searchtype']) && $_GET['searchtype'] == 'adv') {
        if (trim($_GET['title']) != '') {
            $title = trim($_GET['title']);
            $keywords .= 'title='.$title.' ';
        }
        if (trim($_GET['author']) != '') {
            $author = trim($_GET['author']);
            $keywords .= 'author='.$author.' ';
        }
        if (trim($_GET['subject']) != '') {
            $subject = trim($_GET['subject']);
            $keywords .= 'subject='.$subject.' ';
        }
        if (trim($_GET['publisher']) != '') {
            $publisher = trim($_GET['publisher']);
            $keywords .= 'publisher='.$publisher.' ';
        }
        if (trim($_GET['isbn']) != '') {
            $isbn = trim($_GET['isbn']);
            $keywords .= 'isbn='.$isbn.' ';
        }
        if (trim($_GET['gmd']) != '0' && trim($_GET['gmd']) != '') {
            $gmd = trim($_GET['gmd']);
            $keywords .= 'gmd="'.$gmd.'" ';
        }
        if (trim($_GET['clipdate']) != '0' && trim($_GET['clipdate']) != '') {
            $clipdate = trim($_GET['clipdate']);
            $keywords .= 'clipdate="'.$clipdate.'" ';
        }
    }
    echo slims_biblio($keywords);
}
?>
