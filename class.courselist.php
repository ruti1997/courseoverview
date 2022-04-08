<?php

require_once __DIR__ . '/class.course.php';
define( 'NUMPERPAGE', '10' );

class courselist {

    private $Courses = [];

    function __construct($courses)
    {
        if (empty($courses)) {
            $img_url = 'https://img.lovepik.com/background/20211021/large/lovepik-creative-splash-background-image_400122183.jpg';
            $this->Courses[] = new course('test1', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test2', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test3', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test4', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test5', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test6', $img_url, [new tag('aa', true), new tag('cc', true)]);
            $this->Courses[] = new course('test7', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test8', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test9', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test10', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test11', $img_url, [new tag('bb', true)]);
            $this->Courses[] = new course('test12', $img_url, [new tag('bb', true)]);
            $this->Courses[] = new course('test13', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test14', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test15', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test16', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test17', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test18', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test19', $img_url, [new tag('aa', true)]);
            $this->Courses[] = new course('test20', $img_url, [new tag('aa', true)]);        } else {
            foreach ($courses as $course) {
                $this->Courses[] = $course;
            }
        }
    }

    public function setCourses(course $Courses)
    {
        $this->Courses = $Courses;
    }

    public function getCourses(int $page)
    {
        return array_slice( $this->Courses, $pos, $pos + NUMPERPAGE);
    }

    public function pageing($page)
    {
        $this_page = home_url() . '/wp-content/plugins/coursedashoard/course.php';
        $courses = range(1, count($this->Courses)); // courses array to be paginated
        $num_results = count($courses);

        if(empty($page)) {
            $page = 1;
        }

        // extra variables to append to navigation links (optional)
        $linkextra = [];
        if(isset($_GET['var1']) && $var1 = $_GET['var1']) { // repeat as needed for each extra variable
        $linkextra[] = "var1=" . urlencode($var1);
        }
        $linkextra = implode("&amp;", $linkextra);
        if($linkextra) {
        $linkextra .= "&amp;";
        }

        // build array containing links to all pages
        $tmp = [];
        for($p=1, $i=0; $i < $num_results; $p++, $i += NUMPERPAGE) {
        if($page == $p) {
        // current page shown as bold, no link
        $tmp[] = "<b>{$p}</b>";
        } else {
        $tmp[] = "<a href=\"{$this_page}?{$linkextra}page={$p}\">{$p}</a>";
        }
        }

        // thin out the links (optional)
        for($i = count($tmp) - 3; $i > 1; $i--) {
        if(abs($page - $i - 1) > 2) {
        unset($tmp[$i]);
        }
        }

        // display page navigation iff courses covers more than one page
        if(count($tmp) > 1) {
        echo "<p>";

        if($page > 1) {
        // display 'Prev' link
        echo "<a href=\"{$this_page}?{$linkextra}page=" . ($page - 1) . "\">&laquo; Prev</a> | ";
        } else {
        echo "Page ";
        }

        $lastlink = 0;
        foreach($tmp as $i => $link) {
        if($i > $lastlink + 1) {
            echo " ... "; // where one or more links have been omitted
        } elseif($i) {
            echo " | ";
        }
        echo $link;
        $lastlink = $i;
        }

        if($page <= $lastlink) {
        // display 'Next' link
        echo " | <a href=\"{$this_page}?{$linkextra}page=" . ($page + 1) . "\">Next &raquo;</a>";
        }

        echo "</p>\n\n";
        }
    }
}

