<?php
class Chat {
    public static function GetAll() {
        $res = Db::Query("
            SELECT chat.text AS text
		FROM chat
        ", LINK);

        $items = Db::FetchTable($res);
	return $items;
    }
}
?>
