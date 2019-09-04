<?php

class attachment {

    function config($name, $value, $params = null)
    {
        $this->ci = & get_instance();

        $this->name = $name;
        $this->value = $value;
        $this->size = (isset($params[1]) ? $params[1] : '50');
    }

    function field_view()
    {
        if (trim($this->value) !== ""):
            return "<a href='/media/articles/{$this->value}' target=\"_blank\">{$this->value}</a>";
        else:
            // norman: added field so user be able to enter a filename
            return "<input type='text' name='{$this->name}' value='{$this->value}' class='tb' size='{$this->size}'>";
        endif;
    }

    function display_view()
    {

        return "<a href='/media/articles/{$this->value}' target=\"_blank\">{$this->value}</a>";
    }

    function process_form()
    {
        return $this->value;
    }

}

?>