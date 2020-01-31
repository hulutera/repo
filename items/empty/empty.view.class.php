<?php

class EmptyView
{
    public function show($item)
    {
        echo "<div id='mainColumnX'> <div id='spanMainColumnX'>" . htGlobal::get('MESSAGE_TYPE_ITEM_NOT_FOUND') . "</div></div>";
    }
}
