<?php $this->slot("title", __("Listing Types", WPJB_DOMAIN)); ?>
<?php $this->_include("header.php"); ?>

<div class="wpjb-buttons">
    <a href="<?php echo $this->_url->linkTo("wpjb/listing", "edit"); ?>"class="button button-highlighted">
        <?php _e("Add New Listing", WPJB_DOMAIN) ?>
    </a>
</div>

<form method="post" action="" id="wpjb-delete-form">
    <input type="hidden" name="delete" value="1" />
    <input type="hidden" name="id" value="" id="wpjb-delete-form-id" />
</form>

<script type="text/javascript">
    Wpjb.DeleteType = "<?php _e("listing", WPJB_DOMAIN) ?>";
</script>

<form method="post" action="" id="posts-filter">
<input type="hidden" name="action" id="wpjb-action-holder" value="-1" />

<div class="tablenav">

<div class="alignleft actions">
    <select id="wpjb-action1">
        <option selected="selected" value="-1"><?php _e("Bulk Actions", WPJB_DOMAIN) ?></option>
        <option value="delete"><?php _e("Delete", WPJB_DOMAIN) ?></option>
        <option value="activate"><?php _e("Activate", WPJB_DOMAIN) ?></option>
        <option value="deactivate"><?php _e("Deactivate", WPJB_DOMAIN) ?></option>
    </select>

    <input type="submit" class="button-secondary action" id="wpjb-doaction1" value="<?php _e("Apply", WPJB_DOMAIN) ?>"/>

</div>

<div class="clear"/>&nbsp;</div>

<table cellspacing="0" class="widefat post fixed">
    <?php foreach(array("thead", "tfoot") as $tx): ?>
    <<?php echo $tx; ?>>
        <tr>
            <th style="" class="manage-column column-cb check-column" scope="col"><input type="checkbox"/></th>
            <th style="" class="column-comments" scope="col"><?php _e("Id", WPJB_DOMAIN) ?></th>
            <th style="" class="" scope="col"><?php _e("Title", WPJB_DOMAIN) ?></th>
            <th style="" class="" scope="col"><?php _e("Price", WPJB_DOMAIN) ?></th>
            <th style="" class="" scope="col"><?php _e("Visible", WPJB_DOMAIN) ?></th>
            <th style="" class="column-icon" scope="col"><?php _e("Featured", WPJB_DOMAIN) ?></th>
            <th style="" class="fixed column-icon" scope="col"><?php _e("Active", WPJB_DOMAIN) ?></th>
        </tr>
    </<?php echo $tx; ?>>
    <?php endforeach; ?>

    <tbody>
        <?php foreach($data as $i => $item): ?>
	<tr valign="top" class="<?php if($i%2==0): ?>alternate <?php endif; ?>  author-self status-publish iedit">
            <th class="check-column" scope="row">
                <input type="checkbox" value="<?php echo $item->getId() ?>" name="item[]"/>
            </th>
            <td class=""><?php echo $item->getId() ?></td>
            <td class="post-title column-title">
                <strong><a title='<?php _e("Edit", WPJB_DOMAIN) ?>  "(<?php echo($item->title) ?>)"' href="<?php echo $this->_url->linkTo("wpjb/listing", "edit/id/".$item->getId()); ?>" class="row-title"><?php echo esc_html($item->title) ?></a></strong>
                <div class="row-actions">
                    <span class="edit"><a title="<?php _e("Edit", WPJB_DOMAIN) ?>" href="<?php echo $this->_url->linkTo("wpjb/listing", "edit/id/".$item->getId()); ?>"><?php _e("Edit", WPJB_DOMAIN) ?></a> | </span>
                    <span class=""><a href="#<?php echo $item->getId() ?>" title="<?php _e("Delete", WPJB_DOMAIN) ?>" class="wpjb-delete"><?php _e("Delete", WPJB_DOMAIN) ?></a> | </span>
                </div>
            </td>
            <td class="author column-author"><?php echo($item->getTextPrice()) ?></td>
            <td class="categories column-categories"><?php echo ($item->visible==0) ? __("<i>always</i>", WPJB_DOMAIN) : ($item->visible." ".__("days", WPJB_DOMAIN)) ?></td>
            <td class="tags column-tags"><?php echo ($item->is_featured) ? __("Yes", WPJB_DOMAIN) : __("No", WPJB_DOMAIN) ?></td>
            <td class="date column-date"><?php echo ($item->is_active) ? __("Yes", WPJB_DOMAIN) : __("No", WPJB_DOMAIN) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="tablenav">
    <div class="tablenav-pages">
        <?php
        echo paginate_links( array(
                'base' => $this->_url->linkTo("wpjb/listing", "index/page/%_%"),
                'format' => '%#%',
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'total' => $total,
                'current' => $current
        ));
        ?>
    </div>


    <div class="alignleft actions">
        <select id="wpjb-action2">
            <option selected="selected" value="-1"><?php _e("Bulk Actions", WPJB_DOMAIN) ?></option>
            <option value="delete"><?php _e("Delete", WPJB_DOMAIN) ?></option>
            <option value="activate"><?php _e("Activate", WPJB_DOMAIN) ?></option>
            <option value="deactivate"><?php _e("Deactivate", WPJB_DOMAIN) ?></option>
        </select>
        <input type="submit" class="button-secondary action" id="wpjb-doaction2" value="<?php _e("Apply", WPJB_DOMAIN) ?>"/>

        <br class="clear"/>
    </div>

    <br class="clear"/>
</div>


</form>


<?php $this->_include("footer.php"); ?>