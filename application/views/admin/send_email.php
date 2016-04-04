<div class="panel panel-blue">
<?php 
                if(isset($error))
                {
                foreach ($error as $error_item):
                ?>
                <div class=<?php if($error_item[1]==0) echo "'alert alert-info alert-danger'";
                else echo "'alert alert-info alert-success'";?> role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $error_item[0];?>
                </div>
                <?php endforeach;
                } 
                ?>
    <div class="panel-heading">
        Email all the Students
    </div>
    <div class="panel-body pan">
       <?php echo form_open('admin/send_email');?>

            <div class="form-body pal">
                    <div class="form-group">
                        <label for="usertype">Select the type of Users to send the mail</label>
                        <select id="usertype" name="usertype" class="form-control">
                            <option value="student">Students</option>
                            <option value="faculty">Faculty</option>
                            <option value="mentor">Mentors</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="inputSubject" class="control-label">
                        Subject
                    </label>
                        <input id="inputSubject" type="text" placeholder="Enter the subject of the email here" name="subject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage" class="control-label">
                        Message
                    </label>
                    <textarea rows="5" class="form-control" name="message" placeholder="Enter the email body here"></textarea>
                </div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Send message
                </button>
            </div>
        </form>
    </div>
</div>