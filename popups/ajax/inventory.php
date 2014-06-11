<?php
include(dirname(__FILE__) . '/../../inc/init.php');
$Consigner = new Database('consign.db');
$db = $Consigner->connectDB();
?>
	<div id="results">
	<!-- Table -->
	<table id="rows" class="table table-hover table-condensed">
	<thead>
	<tr>
	<?php
		if(isset($_GET['search'])){
			echo "<th id='ProductID'>ID</th>
				<th id='ProductType'>Type</th>
				<th id='ProductColor'>Color</th>
				<th id='ProductSize'>Size</th>
				<th id='ProductDescription'>Description</th>
				<th id='Price'>Price</th>";
		}
	?>
	</thead>
	<tbody>
	<?php
	if(isset($_GET['search'])){
		
			// How many items to list per page
			$limit = 30;
			
			//current page we are on
			$page = isset($_GET['page'])?intval($_GET['page']):1;
			
			// Calculate the offset for the query
			$offset = ($page - 1) * $limit;
			
			$qString = "";
			if($_GET['search'] == "latest"){
				$qString = "SELECT ProductID, ProductType, ProductColor, ProductSize, ProductDescription, (OrigPrice + BuyersFee) as Price FROM Merchandise WHERE ProductID > 0 AND EnterDate >= DATE(date('now'), '-24 hours') and TransferDate is NULL order by ProductType";
			}
			else{
			$qString = "SELECT Merchandise.ProductID, Merchandise.ProductType, Merchandise.ProductColor, Merchandise.ProductSize, Merchandise.ProductDescription, (Merchandise.Price + Merchandise.BuyersFee) as Price FROM (Merchandise LEFT OUTER JOIN InvDetails ON Merchandise.ProductID = InvDetails.ProductID) WHERE (InvDetails.ProductID IS NULL) AND (Merchandise.TransferInd = 'Available' OR Merchandise.TransferInd = 'Vendor') AND (Merchandise.ExpireDate >= date('now')) AND (Merchandise.ProductType LIKE '%".$_GET['search']."%' OR Merchandise.ProductSize LIKE '%".$_GET['search']."%' OR Merchandise.ProductDescription LIKE '%".$_GET['search']."%' OR Merchandise.ProductDescription LIKE '%".$_GET['search']."%')";
			}
			if(isset($_GET['sort']) === true ){
				$qString .= " ORDER BY " . $_GET['sort'];
				$qString .= " " . $_GET['order'];
			}else if($_GET['search'] != "latest"){
				$qString .= "ORDER BY ProductSize, ProductType, ProductColor, Price";
			}
			$count = $qString;
			$q = $db->prepare($count);
			$q->execute();
			$row = $q->fetchAll(PDO::FETCH_ASSOC);
			$total = count($row);
			if( $offset > 0 ){
				$qString .=  " LIMIT 999999999 OFFSET ". $offset;
			}
			$q = $db->prepare($qString);
			$q->execute();
			$row = $q->fetchAll(PDO::FETCH_ASSOC);
			$c = 0;
			foreach($row as $item){
				$c = $c + 1;
				if($c >= $limit){
					break;
				}
				echo "<tr>";
				foreach(array("ProductID", "ProductType", "ProductColor", "ProductSize", "ProductDescription", "Price") as $col){
					if($col=="Price")
						echo "<td>$" . money_format('%i', $item[$col]) ."</td>";
					else
						echo "<td>" . $item[$col] ."</td>";
				}
				echo "</tr>";

			}
			echo '</tbody></table>';
		}
		
		// How many pages will there be
		$pages = ceil($total / $limit);
		
	if($pages > 1){
		$pagesShown = 5;
		$firstPage = ($page) - ( $page % $pagesShown ) + 1;
		if(($firstPage - 1) == $page)
			$firstPage = $page - ($pagesShown -1);
		if($page <= $pagesShown)
			$firstPage = 1;
		$lastPage = ($firstPage + $pagesShown) - 1;
		//echo '[F:' . $firstPage . ' C:' . $page . ' L:' . $lastPage.']';
		$last = ceil($total / $limit);
		echo '<div style="float:left;">(Page '. $firstPage .' of '. $last .') '.$total.' items found.</div>';
	?>
<div class="btn-group" id="pages" style="float:right;">
<?php
if($page <= $pagesShown)
	echo '<a class="btn btn-primary disabled">&laquo;</a>';
else
	echo '<a class="btn btn-primary page-selector" id="page-'. ($firstPage - 1) .'">&laquo;</a>';
for($i = $firstPage; $i<=$lastPage; $i++){
	if($i <= $last){
		if($page == $i)
			echo '<a class="btn btn-primary page-selector" id="page-'.$i.'"><strong>'.$i.'</strong></a>';
		else
			echo '<a class="btn btn-primary page-selector"  id="page-'.$i.'">'.$i.'</a>';
	}
}
if($pages == $lastPage)
	echo '<a class="btn btn-primary disabled">&raquo;</a>';
else
	echo '<a class="btn btn-primary page-selector" id="page-'. ($lastPage + 1) .'">&raquo;</a>';
?>
</div>
<?php
}
?>
</div>
