

<div class="vbx-applet calllogger-applet">
    <h2>This applet sends an API call to a logging API for calls</h2>
    <p>Enter in the URL you would like to send the API call to</p>
    <textarea class="medium" name="prompt-text"><?php 
        echo AppletInstance::getValue('prompt-text') 
    ?></textarea>
 <br />
    <h2> Select An Action for The Caller</h2>
    <?php echo AppletUI::DropZone('primary'); ?>
</div>

