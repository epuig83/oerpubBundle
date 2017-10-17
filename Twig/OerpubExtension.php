<?php

namespace oerpub\oerpubBundle\Twig;

class OerpubExtension extends \Twig_Extension
{
    public function getName() {
        return 'oerpub';
    }

    public function getFunctions()
    {

        return array(
            'oerpub' => new \Twig_SimpleFunction(
                'oerpub',
                array($this, 'oerpub'),
                array('is_safe' => array('html'))
            ),
        );
    }

    public function fullCalendar()
    {
        return "
    <div id=\"ie6-container-wrap\">
        <div id=\"container\">
            <!-- ================= -->
            <!--  Toolbar Buttons  -->
            <!-- ================= -->
            <metal:toolbar define-macro=\"toolbar\">
                <div class=\"toolbar aloha-dialog\">
                    <div class=\"btn-toolbar\">
                        <div class=\"btn-group\">
                            <button class=\"btn btn-primary action save\" rel=\"tooltip\" title=\"Save\">Save</button>
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action redo\" rel=\"tooltip\" title=\"Redo\"><i class=\"icon-repeat\"></i></button>
                            <button class=\"btn btn-default action undo\" rel=\"tooltip\" title=\"Undo\"><i class=\"icon-undo\"></i></button>
                        </div>
                        <div class=\"btn-group headings\">
                            <button class=\"btn btn-default heading dropdown-toggle\" data-toggle=\"dropdown\" rel=\"tooltip\" title=\"Text Heading\" id=\"headingbutton\">
                                <span class=\"currentHeading\">&nbsp;</span>
                                <span class=\"caret\"></span></button>
                            <ul class=\"dropdown-menu\"></ul>
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action strong\" rel=\"tooltip\" title=\"Bold\"><i class=\"icon-bold\"></i></button>
                            <button class=\"btn btn-default action emphasis\" rel=\"tooltip\" title=\"Italics\"><i class=\"icon-italic\"></i></button>
                            <button class=\"btn btn-default action underline\" rel=\"tooltip\" title=\"Underline\"><i class=\"icon-underline\"></i></button>
                            <button class=\"btn btn-default action  superscript\" rel=\"tooltip\" title=\"Superscript\"><i class=\"icon-superscript\"></i></button>
                            <button class=\"btn btn-default action subscript\" rel=\"tooltip\" title=\"Subscript\"><i class=\"icon-subscript\"></i></button>
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action insertLink\" rel=\"tooltip\" title=\"Insert Link\"><i class=\"icon-link\"></i></button>
                            <!-- <button class=\"btn action changeHeading\" data-tagname=\"pre\" rel=\"tooltip\" title=\"Code\">Code</button> -->
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action unorderedList\" rel=\"tooltip\" title=\"Insert Unordered List\"><i class=\"icon-list-ul\"></i></button>
                            <button class=\"btn btn-default action orderedList\" rel=\"tooltip\" title=\"Insert Ordered List\"><i class=\"icon-list-ol\"></i></button>
                            <button class=\"btn btn-default action indentList\" rel=\"tooltip\" title=\"Indent list item (move right)\"><i class=\"icon-indent-list\"></i></button>
                            <button class=\"btn btn-default action outdentList\" rel=\"tooltip\" title=\"Unindent list item (move left)\"><i class=\"icon-outdent-list\"></i></button>
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action insertImage-oer\" rel=\"tooltip\" title=\"Insert Image\"><i class=\"icon-image-insert\"></i></button>
                            <!--<button class=\"btn action insertVideo-oer\" rel=\"tooltip\" title=\"Insert Video\"><i class=\"icon-image-insert\"></i></button>-->
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action createTable\" rel=\"tooltip\" title=\"Create Table\"><i class=\"icon-table\"></i></button>
                            <button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" rel=\"tooltip\" title=\"Table Operations\">
                                <span class=\"caret\"></span>
                            </button>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"#\" class=\"action addrowbefore\">Add Row Before</a></li>
                                <li><a href=\"#\" class=\"action addrowafter\">Add Row After</a></li>
                                <li><a href=\"#\" class=\"action addcolumnbefore\">Add Column Before</a></li>
                                <li><a href=\"#\" class=\"action addcolumnafter\">Add Column After</a></li>
                                <li><a href=\"#\" class=\"action addheaderrow\">Add Header Row</a></li>
                                <li><a href=\"#\" class=\"action deleterow\">Delete Row</a></li>
                                <li><a href=\"#\" class=\"action deletecolumn\">Delete Column</a></li>
                                <li><a href=\"#\" class=\"action deletetable\">Delete Table</a></li>
                            </ul>
                        </div>
    
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action insertMath\" rel=\"tooltip\" title=\"Insert Math\"><em>x+y</em></button>
                        </div>
    
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" rel=\"tooltip\" title=\"Add a new...\">
                                Add a new...
                                <span class=\"caret\"></span>
                            </button>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"#\" class=\"action insertNote\">Note to Reader</a></li>
                                <li><a href=\"#\" class=\"action insertExample\">Example</a></li>
                                <li><a href=\"#\" class=\"action insertExercise\">Exercise</a></li>
                                <li><a href=\"#\" class=\"action insertQuotation\">Quotation</a></li>
                                <li><a href=\"#\" class=\"action insertEquation\">Equation</a></li>
                            </ul>
                        </div>
                        <div class=\"btn-group\">
                            <button class=\"btn btn-default action paste\" rel=\"tooltip\" title=\"paste\">Paste</button>
                        </div>
                    </div>
    
                    <div style=\"margin-top: 20px; width: 200px;\">
                        <h4>Drag to add a new ...</h4>
    
                        <div class=\"semantic-drag-source\">
                            <div class=\"note\">
                                <div class=\"title\"></div>
                            </div>
    
                            <div class=\"example\">
                                <div class=\"title\"></div>
                            </div>
    
                            <div class=\"exercise\">
                                <div class=\"problem\"></div>
                            </div>
    
                            <blockquote class=\"quote\">
                            </blockquote>
    
                            <div class=\"equation\">
                            </div>
                        </div>
    
                    </div>
                </div><!-- / \".toolbar\" -->
            </metal:toolbar>
    
            <div id=\"content\">
                <div id=\"artboard\">
                    <metal:editor define-macro=\"editor\">
                        <div id=\"statusmessage\"></div>
                        <div id=\"editor\">
                            <div id=\"canvas\" class=\"aloha-root-editable\" style=\"margin-left: 200px;\"></div>
                        </div>
                    </metal:editor>
                </div>
            </div>
        </div>
    </div>
    ";
    }
}