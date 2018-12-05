<?php
	class Stat{
		public static function addStat(){
			$db = Db::getConnection();

			$sql = 'INSERT INTO stat ()'
            .'VALUES ()';
            $db->exec($sql);
		}

		public static function getAllEnters(){
			$db = Db::getConnection();

			$query=$db->query("SELECT COUNT(*) as count FROM stat");
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$row=$query->fetch();
			$count=$row['count'];

			return $count;
		}

		public static function getMonthEnters(){
			$db = Db::getConnection();

			$monthCount = 0;

			$today = getdate();
			$year = $today["year"];
			$month = $today["mon"];
			$sql = 'SELECT date_of_enters FROM stat';
			    foreach ($db->query($sql) as $row) {
			        $date_of_enter = explode("-",$row["date_of_enters"]);
			        if ($date_of_enter[0] == $year && $date_of_enter[1] == $month) {
			        	$monthCount++;
			        }
			    }
			return $monthCount;
		}
	}
?>