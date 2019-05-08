<div class="user-panel">
    <div class="pull-center image" align="center">
        <p id="retractIt" style="color:white;text-align:left;padding-left:10px;"><?php echo($this->request->getsession()->read('Auth.User.username')); ?><br><?php echo($this->request->getsession()->read('Auth.User.role'));?></p>
    </div>
</div>