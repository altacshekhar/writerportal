<?php 
// pre($backlink_list);
// pre($backlink_url_list);
// pre($campaign_quantity);

?>
<style>
.d-row-flex>.col, .d-row-flex>[class*='col-'] {
    padding-right: 5px;
    padding-left: 5px;
}
</style>
<div class="form-row">
    <div class="col-2">
        <?php 

        for ($i=0; $i < $campaign_quantity ; $i++) { 
            

        ?>
        <div class="form-group" style="height: 45px;">
            <div class="d-flex justify-content-between">
                <label for="" data-original-title="" title="" class="col-form-label">Article <?php echo $i ?></label>
                <label for="" data-original-title="" title="" class="col-form-label">Anchor Text </label>
            </div>
            
        </div>
        <?php 

        }
        ?>
    </div>
    <div class="col-5">
    <div style="overflow-x: scroll">
      <div class="d-flex d-row-flex">
      
      
         <?php 
       
        foreach ($backlink_url_list as $key => $backlink_url) {

            $backlink = $backlink_list[$backlink_url];
            //pre($backlink);
            $keywords=explode(",",$backlink['keywords']);
            $temp_k=0;
            ?>
        <div class="col-4">
       <?php for ($i=0; $i < $campaign_quantity ; $i++) { 
           if(($temp_k) == count($keywords)){
            $temp_k=0;
    
           }  

        ?>
        <div class="form-group" style="height: 45px;">
            <input type="hidden" class="form-control" id="backlinks-url-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_url][]" placeholder="URL" value="<?php echo $backlink_url; ?>" required="">
            <input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_id][]" value="<?php echo $backlink ['article_id']?>">
            <input type="text" class="form-control px-1" id="backlinks-anchor-text-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_anchortext][]" placeholder="Anchor text <?php echo $i ?>" value="<?php echo $keywords[$temp_k]?>" required="">
        </div>
        <?php $temp_k++; } ?>
        </div>
        <?php } ?>
        </div>
        </div>
    </div>
    <div class="col-5">
    <?php 
        
        for ($i=0; $i < $campaign_quantity ; $i++) { 
            

        ?>
        <div class="form-row">
            <div class="col-3">
            <div class="form-group" style="height: 45px;">
                <select class="form-control select-2 px-1" name="publisher[]" id="publisher_<?php echo $i ?>">
                    <option value="">---Select---</option>
                </select>
                </div>
            </div>
            <div class="col-3">
            <div class="form-group" style="height: 45px;">
                <select class="form-control select-2 px-1" name="campaign_writer[]" id="campaign_writer_<?php echo $i ?>">
                <?php
                foreach ($writer_list as $id => $writer) {
                echo '<option value="'.$id.'">'.$writer.'</option>';
                }
                ?>
                
                </select>
                </div>
            </div>
            <div class="col-2">
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Length" class="form-control px-1" name="length[]" id="length_<?php echo $i ?>">
                </div>
            </div>
            <div class="col-2">
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Cost" class="form-control px-1" name="cost[]" id="cost_<?php echo $i ?>">
                </div>
            </div>
            <div class="col-2"> 
            <div class="form-group" style="height: 45px;">
                <input type="text" placeholder="Notes" class="form-control px-1" name="notes[]" id="notes_<?php echo $i ?>">
                </div>
            </div>
        </div>
     <?php } ?>
    </div>
    
</div>
<?php 
 $temp_k=0;
for ($i=0; $i < $campaign_quantity ; $i++) { 
    

?>
<div class="form-row">
    <div class="col-md-2">
        <label for="" data-original-title="" title="">Article <?php echo $i ?></label>
        <label for="" data-original-title="" title="">Anchor Text </label>
    </div>
    <div class="col-md-5">
      <div style="overflow-x: scroll">
        <div class="d-flex">
        <?php 
       
            foreach ($backlink_url_list as $key => $backlink_url) {
                $backlink = $backlink_list[$backlink_url];
                $keywords=explode(",",$backlink['keywords']);
               
                if(($temp_k+1) == count($keywords)){
                   
            
                    $temp_k=0;
            
                } 
                
            ?>
                <div class="col-4 px-1">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="backlinks-url-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_url][]" placeholder="URL" value="<?php echo $backlink_url; ?>" required="">
                        <input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_wp_id][]" value="<?php $backlink ['article_id']?>">
                        <input type="text" class="form-control px-1" id="backlinks-anchor-text-<?php echo $i ?>-<?php echo $key ?>" name="backlinks[<?php echo $i ?>][article_anchortext][]" placeholder="Anchor text <?php echo $i ?>" value="<?php echo $keywords[$temp_k]?>" required="">
                    </div>
                    <?php  
                    pre($keywords);
                    pre($temp_k);
                    pre(count($keywords));
                    
                    ?>
            </div>
            
            <?php  
              
             } ?>
            </div>  
       </div>
    </div>
    <div class="col-md-5">
     <div class="form-row">
         <div class="col-3">
            <div class="form-group">
            <select class="form-control select-2 px-1" name="publisher[]" id="publisher_<?php echo $i ?>">
                <option value="">---Select---</option>
            </select>
            </div>
         </div>
         <div class="col-3">
             <div class="form-group">
            <select class="form-control select-2 px-1" name="campaign_writer[]" id="campaign_writer_<?php echo $i ?>">
            <?php
            foreach ($writer_list as $id => $writer) {
               echo '<option value="'.$id.'">'.$writer.'</option>';
            }
            ?>
             
            </select>
            </div>
         </div>
         <div class="col-2">
           <div class="form-group">
            <input type="text" placeholder="Length" class="form-control px-1" name="length[]" id="length_<?php echo $i ?>">
            </div>
         </div>
         <div class="col-2">
            <div class="form-group">
            <input type="text" placeholder="Cost" class="form-control px-1" name="cost[]" id="cost_<?php echo $i ?>">
            </div>
         </div>
         <div class="col-2"> 
            <div class="form-group">
            <input type="text" placeholder="Notes" class="form-control px-1" name="notes[]" id="notes_<?php echo $i ?>">
            </div>
         </div>
     </div>
    
    </div>
</div>
 <?php $temp_k++; } ?>
<div class="row">
	<div class="build-backlinks col-md-6" style="overflow-x: scroll">
		<div class="form-row-1 backlink-row d-flex">
			<div class="col-md-2 mt-2">
				<label for="" data-original-title="" title="">Article 1</label>
			</div>
			<div class="col-md-2 mt-2">
				<label for="" data-original-title="" title="">Anchor Text </label>
			</div>
			<div class="col-md-3 del-row-0 mb-1">
				<label title="" data-original-title="https://plumpos.com/data-collection/pos-inventory.html">https://plumpo..</label>
				<input type="hidden" class="form-control" id="backlinks-url-1-0" name="backlinks[0][article_wp_url][]" placeholder="URL" value="https://plumpos.com/data-collection/pos-inventory.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-1-0" name="backlinks[0][article_wp_id][]" value="2359">
				<input type="text" class="form-control" id="backlinks-anchor-text-1-0" name="backlinks[0][article_anchortext][]" placeholder="Anchor text 1" value="Data Collection" required=""> </div>
			<div class="col-md-3 del-row-1 mb-1">
				<label title="" data-original-title="https://plumpos.com/cloud-solutions/bar-pos.html">https://plumpo..</label>
				<input type="hidden" class="form-control" id="backlinks-url-1-1" name="backlinks[0][article_wp_url][]" placeholder="URL" value="https://plumpos.com/cloud-solutions/bar-pos.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-1-1" name="backlinks[0][article_wp_id][]" value="2371">
				<input type="text" class="form-control" id="backlinks-anchor-text-1-1" name="backlinks[0][article_anchortext][]" placeholder="Anchor text 1" value="Retail POS" required=""> </div>
			<div class="col-md-3 del-row-2 mb-1">
				<label title="" data-original-title="https://plumpos.com/customer-retention-strategies/small-business-social-media-management.html">https://plumpo..</label>
				<input type="hidden" class="form-control" id="backlinks-url-1-2" name="backlinks[0][article_wp_url][]" placeholder="URL" value="https://plumpos.com/customer-retention-strategies/small-business-social-media-management.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-1-2" name="backlinks[0][article_wp_id][]" value="2337">
				<input type="text" class="form-control" id="backlinks-anchor-text-1-2" name="backlinks[0][article_anchortext][]" placeholder="Anchor text 1" value="Customer Loyalty Program Ideas" required=""> </div>
			<div class="col-md-3 del-row-3 mb-1">
				<label title="https://plumpos.com/mobile-commerce/online-retail-business.html">https://plumpo..</label>
				<input type="hidden" class="form-control" id="backlinks-url-1-3" name="backlinks[0][article_wp_url][]" placeholder="URL" value="https://plumpos.com/mobile-commerce/online-retail-business.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-1-3" name="backlinks[0][article_wp_id][]" value="2339">
				<input type="text" class="form-control" id="backlinks-anchor-text-1-3" name="backlinks[0][article_anchortext][]" placeholder="Anchor text 1" value="Mobile Commerce" required=""> </div>
		</div>
		<div class="form-row-2 backlink-row d-flex">
			<div class="col-md-2 ">
				<label for="" data-original-title="" title="">Article 2</label>
			</div>
			<div class="col-md-2 ">
				<label for="" data-original-title="" title="">Anchor Text </label>
			</div>
			<div class="col-md-3 del-row-0 mb-1">
				<input type="hidden" class="form-control" id="backlinks-url-2-0" name="backlinks[1][article_wp_url][]" placeholder="URL" value="https://plumpos.com/data-collection/pos-inventory.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-2-0" name="backlinks[1][article_wp_id][]" value="2359">
				<input type="text" class="form-control" id="backlinks-anchor-text-2-0" name="backlinks[1][article_anchortext][]" placeholder="Anchor text 2" value="Restaurant Accounting" required=""> </div>
			<div class="col-md-3 del-row-1 mb-1">
				<input type="hidden" class="form-control" id="backlinks-url-2-1" name="backlinks[1][article_wp_url][]" placeholder="URL" value="https://plumpos.com/cloud-solutions/bar-pos.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-2-1" name="backlinks[1][article_wp_id][]" value="2371">
				<input type="text" class="form-control" id="backlinks-anchor-text-2-1" name="backlinks[1][article_anchortext][]" placeholder="Anchor text 2" value="Cloud Solutions" required=""> </div>
			<div class="col-md-3 del-row-2 mb-1">
				<input type="hidden" class="form-control" id="backlinks-url-2-2" name="backlinks[1][article_wp_url][]" placeholder="URL" value="https://plumpos.com/customer-retention-strategies/small-business-social-media-management.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-2-2" name="backlinks[1][article_wp_id][]" value="2337">
				<input type="text" class="form-control" id="backlinks-anchor-text-2-2" name="backlinks[1][article_anchortext][]" placeholder="Anchor text 2" value="Point Of Sale Marketing" required=""> </div>
			<div class="col-md-3 del-row-3 mb-1">
				<input type="hidden" class="form-control" id="backlinks-url-2-3" name="backlinks[1][article_wp_url][]" placeholder="URL" value="https://plumpos.com/mobile-commerce/online-retail-business.html" required="">
				<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-2-3" name="backlinks[1][article_wp_id][]" value="2339">
				<input type="text" class="form-control" id="backlinks-anchor-text-2-3" name="backlinks[1][article_anchortext][]" placeholder="Anchor text 2" value="Restaurant Mobile Payment" required=""> </div>
		</div>
		<div class="delete-row d-flex">
			<div class="col-md-2">
				<label for="" data-original-title="" title="">&nbsp; </label>
			</div>
			<div class="col-md-2 ">
				<label for="" data-original-title="" title="">&nbsp; </label>
			</div>
			<div class="col-md-3 del-row-0 text-center">
				<label for="" data-original-title="" title=""></label>
				<a class="deleteBacklink" href="#"> <i class="fas fa-times text-danger fa-lg"></i> </a>
			</div>
			<div class="col-md-3 del-row-1 text-center">
				<label for="" data-original-title="" title=""></label>
				<a class="deleteBacklink" href="#"> <i class="fas fa-times text-danger fa-lg"></i> </a>
			</div>
			<div class="col-md-3 del-row-2 text-center">
				<label for="" data-original-title="" title=""></label>
				<a class="deleteBacklink" href="#"> <i class="fas fa-times text-danger fa-lg"></i> </a>
			</div>
			<div class="col-md-3 del-row-3 text-center">
				<label for=""></label>
				<a class="deleteBacklink" href="#"> <i class="fas fa-times text-danger fa-lg"></i> </a>
			</div>
		</div>
	</div>
	<div class="col-md-6 build-writer-info">
		<div class="form-row d-flex backlink-row">
			<div class="col-md-3 mb-1">
				<label data-original-title="" title="">Publisher</label>
				<select class="form-control select-2" name="publisher[]" id="publisher_1">
					<option value="">---Select---</option>
				</select>
			</div>
			<div class="col-md-3 mb-1">
				<label data-original-title="" title="">Writer</label>
				<select class="form-control select-2" name="campaign_writer[]" id="campaign_writer_1">
					<option value="">---Select---</option>
					<option value="60">Chandra Shekhar</option>
					<option value="64">Manoj Kumar Yadav</option>
					<option value="65">Chandra Shekhar</option>
					<option value="66">Sanjay kumar</option>
					<option value="68">grace wairimu</option>
					<option value="70">Carrie Sams</option>
					<option value="71">Finnegan Pierson</option>
					<option value="72">Liam Smith</option>
					<option value="73">Maine Lobster Marketing Collaborative</option>
					<option value="74">National Sunflower Association</option>
					<option value="76">Surabhi Surendra</option>
					<option value="77">Grace Derbyshire</option>
					<option value="78">Barbara Caruso</option>
					<option value="79">Lindsay Dracca</option>
					<option value="80">Bridgette Hernandez</option>
					<option value="81">Boston Harbor Hotel</option>
					<option value="82">Carolette</option>
					<option value="83">Jennifer Leggett</option>
					<option value="84">Say2B</option>
					<option value="85">Kristin Savage</option>
					<option value="86">Katie Alteri</option>
					<option value="87">Kelsey Kovacs</option>
					<option value="88">Matthew Gierc</option>
					<option value="89">Abdul Khan</option>
					<option value="90">Nick Arthur</option>
					<option value="92">Devin Owen</option>
					<option value="93">Alycia Tollison</option>
					<option value="95">Ian Heinig</option>
					<option value="94">Justin Stewart</option>
					<option value="96">John Adebimitan</option>
					<option value="98">Kathy Brellan</option>
					<option value="99">Megan Jones</option>
					<option value="100">Julia Ching</option>
					<option value="101">Rahul Pise</option>
					<option value="102">dristen</option>
					<option value="103">Sydney Van Alstyne</option>
					<option value="107">Bianca Esmond</option>
					<option value="108">Elizabeth Kelly</option>
					<option value="109">Cheryl Hearts</option>
					<option value="110">Alexey Kutsenko</option>
					<option value="131">Deven O'Gryzek</option>
					<option value="62">Victoria Brunette</option>
					<option value="61">Mitesh Gala</option>
					<option value="69">Kevin England</option>
					<option value="132">Mark Plumlee</option>
					<option value="135">Kevin Joseph</option>
					<option value="63">Caroline Sams</option>
					<option value="119">Mike Jones</option>
					<option value="112">Serina Achall</option>
					<option value="114">Lianna Araqelyan</option>
					<option value="1">Mitesh Gala</option>
					<option value="115">Leigh</option>
					<option value="116">Umesh Singh</option>
					<option value="113">Chloe Henderson</option>
					<option value="140">Pearl De Guzman</option>
					<option value="121">Christopher Monk</option>
					<option value="122">Bharat Dogra</option>
					<option value="123">Aggy Zawadzka</option>
					<option value="124">Lauren Christiansen</option>
					<option value="111">Mary Kate Morrow</option>
					<option value="136">Sumit Khatpe</option>
					<option value="126">Gina Argenta</option>
					<option value="128">Abdulla Maseeh</option>
					<option value="137">Rohini sharma</option>
					<option value="129">Kseniya</option>
					<option value="130">Hanh Truong</option>
					<option value="143">Test Staff Writer</option>
					<option value="144">Test Contributor Writer</option>
					<option value="147">Melisa Jordan</option>
					<option value="148">emma bailey</option>
				</select>
			</div>
			<div class="col-md-2 mb-1">
				<label data-original-title="" title="">Length</label>
				<input type="text" placeholder="Length" class="form-control col-md-12" name="length[]" id="length_1">
			</div>
			<div class="col-md-2 mb-1">
				<label data-original-title="" title="">Cost</label>
				<input type="text" placeholder="Cost" class="form-control col-md-12" name="cost[]" id="cost_1">
			</div>
			<div class="col-md-2 mb-1">
				<label data-original-title="" title="">Notes</label>
				<input type="text" placeholder="Notes" class="form-control col-md-12" name="notes[]" id="notes_1">
			</div>
		</div>
		<div class="form-row d-flex backlink-row">
			<div class="col-md-3 mb-1">
				<select class="form-control select-2" name="publisher[]" id="publisher_2">
					<option value="">---Select---</option>
				</select>
			</div>
			<div class="col-md-3 mb-1">
				<select class="form-control select-2" name="campaign_writer[]" id="campaign_writer_2">
					<option value="">---Select---</option>
					<option value="60">Chandra Shekhar</option>
					<option value="64">Manoj Kumar Yadav</option>
					<option value="65">Chandra Shekhar</option>
					<option value="66">Sanjay kumar</option>
					<option value="68">grace wairimu</option>
					<option value="70">Carrie Sams</option>
					<option value="71">Finnegan Pierson</option>
					<option value="72">Liam Smith</option>
					<option value="73">Maine Lobster Marketing Collaborative</option>
					<option value="74">National Sunflower Association</option>
					<option value="76">Surabhi Surendra</option>
					<option value="77">Grace Derbyshire</option>
					<option value="78">Barbara Caruso</option>
					<option value="79">Lindsay Dracca</option>
					<option value="80">Bridgette Hernandez</option>
					<option value="81">Boston Harbor Hotel</option>
					<option value="82">Carolette</option>
					<option value="83">Jennifer Leggett</option>
					<option value="84">Say2B</option>
					<option value="85">Kristin Savage</option>
					<option value="86">Katie Alteri</option>
					<option value="87">Kelsey Kovacs</option>
					<option value="88">Matthew Gierc</option>
					<option value="89">Abdul Khan</option>
					<option value="90">Nick Arthur</option>
					<option value="92">Devin Owen</option>
					<option value="93">Alycia Tollison</option>
					<option value="95">Ian Heinig</option>
					<option value="94">Justin Stewart</option>
					<option value="96">John Adebimitan</option>
					<option value="98">Kathy Brellan</option>
					<option value="99">Megan Jones</option>
					<option value="100">Julia Ching</option>
					<option value="101">Rahul Pise</option>
					<option value="102">dristen</option>
					<option value="103">Sydney Van Alstyne</option>
					<option value="107">Bianca Esmond</option>
					<option value="108">Elizabeth Kelly</option>
					<option value="109">Cheryl Hearts</option>
					<option value="110">Alexey Kutsenko</option>
					<option value="131">Deven O'Gryzek</option>
					<option value="62">Victoria Brunette</option>
					<option value="61">Mitesh Gala</option>
					<option value="69">Kevin England</option>
					<option value="132">Mark Plumlee</option>
					<option value="135">Kevin Joseph</option>
					<option value="63">Caroline Sams</option>
					<option value="119">Mike Jones</option>
					<option value="112">Serina Achall</option>
					<option value="114">Lianna Araqelyan</option>
					<option value="1">Mitesh Gala</option>
					<option value="115">Leigh</option>
					<option value="116">Umesh Singh</option>
					<option value="113">Chloe Henderson</option>
					<option value="140">Pearl De Guzman</option>
					<option value="121">Christopher Monk</option>
					<option value="122">Bharat Dogra</option>
					<option value="123">Aggy Zawadzka</option>
					<option value="124">Lauren Christiansen</option>
					<option value="111">Mary Kate Morrow</option>
					<option value="136">Sumit Khatpe</option>
					<option value="126">Gina Argenta</option>
					<option value="128">Abdulla Maseeh</option>
					<option value="137">Rohini sharma</option>
					<option value="129">Kseniya</option>
					<option value="130">Hanh Truong</option>
					<option value="143">Test Staff Writer</option>
					<option value="144">Test Contributor Writer</option>
					<option value="147">Melisa Jordan</option>
					<option value="148">emma bailey</option>
				</select>
			</div>
			<div class="col-md-2 mb-1">
				<input type="text" placeholder="Length" class="form-control col-md-12" name="length[]" id="length_2">
			</div>
			<div class="col-md-2 mb-1">
				<input type="text" placeholder="Cost" class="form-control col-md-12" name="cost[]" id="cost_2">
			</div>
			<div class="col-md-2 mb-1">
				<input type="text" placeholder="Notes" class="form-control col-md-12" name="notes[]" id="notes_2">
			</div>
		</div>
	</div>
</div>