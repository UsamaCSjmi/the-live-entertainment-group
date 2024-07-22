<!-- FAQs starts -->
<div class="d-flex align-items-center justify-content-center mb-3">
    <h3>FAQs Section</h3>
    <div class="ms-5 mb-2 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="faqs-status" <?php if($content['faqs']['status']) echo "checked"; ?>>
    </div>
 </div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="faqs-order">Order</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="faqs-order" id="faqs-order" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['faqs']['order']?>"
            <?php
        }
        ?>
        placeholder="FAQs Order" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="faqs-heading">FAQs heading</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="faqs-heading" id="faqs-heading" 
        <?php
        if($mode == "edit"){
            ?>
            value="<?php echo $content['faqs']['heading']?>"
            <?php
        }
        ?>
        placeholder="FAQs Heading" />
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="faqs-text">FAQs Text</label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control editor" name="faqs-text" id="faqs-text" 
        placeholder="FAQs text">
        <?php
        if($mode == "edit"){
            
             echo $content['faqs']['text'];
            
        }
        ?>
        </textarea>
    </div>
</div>
<div class="row" id="faqs">
    <?php 
    if($mode=="edit"){
        $faqs = $content['faqs']['faqs'];
        $i=1;
        foreach($faqs as $faq){
            $question = $faq['question'];
            $answer = $faq['answer'];
            ?>
            <div class="row mb-3 faq" id="faq-<?php echo $i?>">
                    <label class="col-sm-2 col-form-label" for="question">Question - <?php echo $i?></label>
                    <div class="col-sm-10">
                        <input class="form-control" name="question" id="question" value="<?php echo $question?>" placeholder="Question"/>
                    </div>
                    <label class="col-sm-2 col-form-label mt-2" for="answer">Answer - <?php echo $i?></label>
                    <div class="col-sm-10 mt-2">
                        <textarea class="editor" name="answer" value="<?php echo $answer?>" id="answer"><?php echo $answer?></textarea>
                    </div>
                    <div class="col-12 row mt-2">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button class="btn btn-danger" onclick="deleteFaqButton(<?php echo $i?>)">Delete FAQ - <?php echo $i?></button>
                        </div>
                    </div>
                </div>  
            <?php
            $i++;
        }
    }
    ?>
</div>
<div class="row mb-3">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <button type="button" class="btn m-0 btn-primary" onclick="addFaqButton()">Add FAQ + </button>
    </div>
</div>
<script>
    function addFaqButton(event){
            faqsArea = document.querySelector("#faqs");
            totalFaqs = document.querySelectorAll(".faq").length;
            faq = `
                <div class="row mb-3 faq" id="faq-${totalFaqs+1}">
                    <label class="col-sm-2 col-form-label" for="question">Question - ${totalFaqs+1}</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="question" id="question" placeholder="Question"/>
                    </div>
                    <label class="col-sm-2 col-form-label mt-2" for="answer">Answer - ${totalFaqs+1}</label>
                    <div class="col-sm-10 mt-2">
                        <textarea class="editor" name="answer" id="answer"></textarea>
                    </div>
                    <div class="col-12 row mt-2">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <button class="btn btn-danger" onclick="deleteFaqButton(${totalFaqs+1})">Delete FAQ - ${totalFaqs+1}</button>
                        </div>
                    </div>
                </div>      
            `;
            faqsArea.innerHTML = faqsArea.innerHTML+faq;   
            editor = document.querySelector(`#faq-${totalFaqs+1} .editor`)
            ClassicEditor
            .create( editor, {} ).then( editor => {
                window.editor = editor;
            } )
            .catch( err => console.log(err));
        }
        function deleteFaqButton(id){
            faq = document.querySelector('#faq-'+id);
            faq.remove()
        }
</script>
<!-- FAQs Ends -->