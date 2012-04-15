<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * zebra theme general page layout
 *
 * @package    theme_zebra
 * @copyright  2011 Danny Wahl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('header.php'); ?>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
    <?php echo $OUTPUT->standard_top_of_body_html(); ?>
    <div id="page">
        <div id="page-inner-wrapper">
            <div id="page-header-wrapper">
                <div id="page-header" class="clearfix">
                    <h1 class="headermain"><?php echo $headeralt; ?></h1>
                    <div id="profileblock">
                        <?php if (isloggedin()) {
                            if ($haslogininfo) {
				if ($showuserpic) {
				    echo html_writer::tag('div', $OUTPUT->user_picture($USER, array('size'=>80)), array('id'=>'user-pic'));
				}
                                echo $OUTPUT->login_info();
                            }
                            if ($haslangmenu) {
                                echo $OUTPUT->lang_menu();
                            }
                            echo $PAGE->headingmenu;
                        } else {
                            echo $OUTPUT->login_info();
                        } ?>
                    </div>
                </div>
                <div id="page-border-wrapper">
                    <?php if ($hascustommenu) { ?>
                        <div id="custommenu-wrapper">
                            <div id="custommenu">
				<?php if ($hashomeicon) {
				    echo '<a class="home" href="' . $homeurl . '"><div>&nbsp;</div></a>';
				}
				echo $custommenu;
				if ($hascallink) {
				    echo '<a class="calendar" href="' . $calurl . '">' . date("$dateformat") . '</a>';
				} ?>
			    </div>
                        </div>
                    <?php } ?>
                    <?php if ($hasnavbar) { ?>
                        <div id="navbar-wrapper">
                            <div class="navbar clearfix">
                                <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                                <div class="navbutton"><?php echo $PAGE->button; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="page-content-wrapper">
                        <div id="page-content" class="clearfix">
                            <div id="report-main-content">
                                <div class="region-content">
                                    <?php echo $OUTPUT->main_content(); ?>
                                </div>
                            </div>
                            <?php if ($hassidepre) { ?>
                                <div id="report-region-wrap">
                                    <div id="report-region-pre" class="block-region">
                                        <div class="region-content">
                                            <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
	    </div>
	    <?php require_once('footer.php');