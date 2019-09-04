<!--
<div style='display:inline-block;' class='pull-right'>
    <table>
        <tr>
            <td style='padding-right:30px;text-align:right;'><b>Hi <?= $this->member->data['username'] ?></b></td>
            <td><img src='<?= $this->member->data['profile'] ?>' class='img-polaroid' style='width:65px;'></td>
        </tr>
    </table>

</div>

<h1 style='margin-bottom:20px;'>My Account</h1>

<ul class="nav nav-tabs">
    <li <?= ($this->uri->segment('2') == '' ? " class='active'" : "") ?>><a href="/my_account">Archive</a></li>
    <li <?= ($this->uri->segment('2') == 'profile' ? " class='active'" : "") ?>><a href="/my_account/profile">My Profile</a></li>
    <li><a href="/main/logout" onClick="Javascript:return confirm('Are you sure you want to logout?');">Logout</a></li>
</ul>
-->
<?php
$unread = $this->messages_model->getUnreadMessages();
$badge = "";
if ($unread > 0)
{
    $badge = "<span class=\"badge badge-important\" id=\"email-count\">{$unread}</span>";
}
?>

<?php if ($this->member->data['member_type'] === 'reader' || $this->member->data['member_type'] === 'both'): ?>
    <a href='/my_account' class='btn <?=($steps === 1)?'btn-primary':'';?>'>Dashboard</a>                        
    <a href='/my_account/messages' class='btn <?=($steps === 2)?'btn-primary':'';?>'>Message Center <?= $badge; ?></a>
    <a href='/my_account/account' class='btn <?=($steps === 3)?'btn-primary':'';?>'>Edit My Account</a>
<?php elseif ($this->member->data['member_type'] === 'affiliate'): ?>

    <a href='/my_account' class='btn <?=($steps === 1)?'btn-primary':'';?>'>Dashboard</a>                        
    <a href='/my_account/messages' class='btn <?=($steps === 2)?'btn-primary':'';?>'>Message Center <?= $badge; ?></a>
    <a href='/my_account/account' class='btn <?=($steps === 3)?'btn-primary':'';?>'>Edit My Account</a>
<?php endif; ?>