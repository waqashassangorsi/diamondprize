<?php 
$winners = $this->db->query("select winners.*,users.*,lottery.* from winners inner join users on winners.u_id=users.u_id inner join lottery on lottery.lottery_id=winners.lottery_id order by winer_date")->result_array();
if(!empty($winners)){
?>
<style>
    @media (max-width: 767px){
        .deposite-content {
            max-width: 100%;
            overflow-x: auto;
        }
        .diposite-box {
            max-width: 100%;
            overflow-x: auto;
        }
        .deposite-table {
            min-width: 1000px;
        }
    }
</style>
<div class="payment-history-area  fix area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="section-headline text-center">
                    <h3>LATEST WINNER</h3>
                  <!--  <p>Dummy text is also used to demonstrate the appearance of different typefaces and layouts</p> -->
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="deposite-content">
                    <div class="diposite-box">
                        <div class="deposite-table" style="background:#fff;box-shadow: 0 0 10px -6px grey;">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Draw Date</th>
                                        <th>Winning Number</th>
                                        <th>Winning price</th>
                                        <th>Lottery name</th>
                                    </tr>
                                    <?php 
                                    
                                        if(!empty($winners)){
                                            foreach($winners as $key=>$value){
                                                
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo $value['dp'];?>" style="width:40px;height:40px;" alt="image Error"><?php echo $value['fname'];?></td>
                                        <td><?php echo $value['winer_date'];?></td>
                                        <td>
                                            <ul class="self-number">
                                                <li><a href="javascript:void(0)"><?php echo $value['ticket_no'];?></a></li>
                                            </ul>
                                        </td>
                                        <td>£<?php echo $value['price'];?></td>
                                        <td><?php echo $value['lottery_name'];?></td>
                                    </tr>
                                    <?php }} ?>
                                    <!--<tr>-->
                                    <!--    <td><img src="assets/images/m.png" alt="">Ragner Lorth</td>-->
                                    <!--    <td>02-03-2019</td>-->
                                    <!--    <td>-->
                                    <!--        <ul class="self-number">-->
                                    <!--            <li><a href="#">12</a></li>-->
                                    <!--            <li><a href="#">23</a></li>-->
                                    <!--            <li><a href="#">24</a></li>-->
                                    <!--            <li><a href="#">26</a></li>-->
                                    <!--            <li><a href="#">31</a></li>-->
                                    <!--        </ul>-->
                                    <!--    </td>-->
                                    <!--    <td>$150k</td>-->
                                    <!--    <td><img src="assets/images/j.png" alt="">Red Jackpot</td>-->
                                    <!--</tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
<?php } ?>