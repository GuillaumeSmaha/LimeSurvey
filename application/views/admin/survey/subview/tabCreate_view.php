<?php
/**
 * Tab Create content
 * This view display the content for the create tab.
 */
?>
<?php
    extract($data);
    Yii::app()->loadHelper('admin/htmleditor');
    PrepareEditorScript(false, $this);
?>
    <!-- Form submited by save buton menu bar -->
    <?php echo CHtml::form(array('admin/survey/sa/insert'), 'post', array('id'=>'addnewsurvey', 'name'=>'addnewsurvey', 'class'=>'form-horizontal')); ?>
        <div class='col-lg-8'>

            <!-- Text elements -->
            <div class="row">

                <!-- base language -->
                <div class="form-group">
                    <label   class="col-sm-2 control-label" for='language' title='<?php  eT("This is the base language of your survey and it can't be changed later. You can add more languages after you have created the survey."); ?>'><span class='annotationasterisk'>*</span><?php  eT("Base language:"); ?></label>
                    <div class="col-sm-5">
                        <select id='language' name='language'  class="form-control">
                            <?php foreach (getLanguageDataRestricted (false, Yii::app()->session['adminlang']) as $langkey2 => $langname) { ?>
                                <option value='<?php echo $langkey2; ?>'
                                <?php if (Yii::app()->getConfig('defaultlang') == $langkey2) { ?>
                                     selected='selected'
                                <?php } ?>
                                ><?php echo $langname['description']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <span class='text-warning'> <?php  eT("*This setting cannot be changed later!"); ?></span></li>
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label class="col-sm-2 control-label"  for='surveyls_title'><?php  eT("Title"); ?> :</label>
                    <div class="col-sm-5">
                        <?php echo CHtml::textField("surveyls_title","",array('class'=>'form-control','maxlength'=>"200",'required'=>'required','autofocus'=>'autofocus','id'=>"surveyls_title")); ?>
                    </div>
                    <span class='text-warning'><?php  eT("Required"); ?> </span>
                </div>


                <!-- Description -->
                <div class="form-group">
                    <label for='description' class="col-sm-2 control-label"><?php  eT("Description:"); ?> </label>
                    <div class='htmleditor col-sm-8 input-group' >
                        <?php echo CHtml::textArea("description","",array('class'=>'form-control','cols'=>'80','rows'=>'10','id'=>"description")); ?>
                        <?php echo getEditor("survey-desc", "description", "[" .  gT("Description:", "js") . "]", '', '', '', $action); ?>
                    </div>
                </div>

                <!-- Welcome message -->
                <div class="form-group">
                    <label for='welcome' class="col-sm-2 control-label">
                        <?php  eT("Welcome message:"); ?>
                    </label>
                    <div class='htmleditor col-sm-8 input-group'>
                        <?php echo CHtml::textArea("welcome","",array('class'=>'form-control','cols'=>'80','rows'=>'10','id'=>"welcome")); ?>
                        <?php echo getEditor("survey-welc", "welcome", "[" .  gT("Welcome message:", "js") . "]", '', '', '', $action) ?>
                    </div>
                </div>

                <!-- End message -->
                <div class="form-group">
                    <label for='endtext' class="col-sm-2 control-label">
                        <?php  eT("End message:") ;?>
                    </label>
                    <div class='htmleditor col-sm-8 input-group'>
                        <?php echo CHtml::textArea("endtext","",array('class'=>'form-control','cols'=>'80','rows'=>'10','id'=>"endtext")); ?>
                        <?php echo getEditor("survey-endtext", "endtext", "[" .  gT("End message:", "js") . "]", '', '', '', $action) ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- Settings in accordion -->
        <div class='col-lg-4'>
            <?php $this->renderPartial('/admin/survey/subview/accordion/_accordion_container', array('data'=>$data)); ?>
        </div>

        <!-- Submit button -->
        <p>
            <button type="submit" name="save"  class="hide" value='insertsurvey'><?php eT("Save"); ?></button>
        </p>
     </form>
