



function updatedata(){
	
//var tablename = document.getElementById("tablename").value;
 var category_name = document.getElementById('field1').value;
 var category_description = document.getElementById('field2').value;
 var category_image = document.getElementById('field3').value;
//window.alert(tablename); 

 var fireref  =  firebase.database().ref();
 var data = {category_name,category_description,category_image};
 fireref.child('Cateogry/').update(data);
 }

 function updatesingle(){
	 var old = $("#oldcat").val();
	var booksRef = '';
	var Ref = '';
	 var sub = $("#oldsubcat").val();
	 var bnd = $("#oldbnd").val();
	 var s = $("#oldsess").val();
	 var fireref  =  firebase.database().ref('Cateogry');
fireref.once('value', function(snapshot) {
	/*Fetching all value from Category node*/
	
	 snapshot.forEach(function(childSnapshot) {

		/*Comparing old and new value from database */
			
			if(old == childSnapshot.key){
					/*Checking SubCategory exist or not for know deep dive category */
					if(childSnapshot.hasChild("SubCategory")) {
						
						/* Checking subcategory or bundle change or not */
						
						if(sub != $("#subcat option:selected").val()){
							
							var n = $("#subcat option:selected").val(); // new subcategory
							/*Referance for fetching old value for update */
						 booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/');
							/*Referance add data to new seletecd value*/
						 Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+n+'/Bundle/'+bnd+'/Session/');
						 ref ='Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/';
						 
						}else if(sub != $("#subcat option:selected").val() && bnd != $("#bnd option:selected").val()){
							
							var n = $("#subcat option:selected").val(); // new subcategory
							var nw = $("#bnd option:selected").val();   // new bundle
							/*Referance for fetching old value for update */
						 booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/');
							/*Referance add data to new seletecd value*/
						 Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+n+'/Bundle/'+nw+'/Session/');
						 ref ='Cateogry/'+childSnapshot.key+'/SubCategory/'+n+'/Bundle/'+nw+'/Session/';
							
						}else{
													
							/*Referance for fetching old value for update */
						 booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/');
						 ref ='Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/';
						}
					//	  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/');
					}else if(childSnapshot.hasChild("Bundle")) {
						
						if(bnd != $("#bnd option:selected").val()){
							
							var nw = $("#bnd option:selected").val(); // new bundle
							
							/*Referance add data to new seletecd value*/
						 Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+nw+'/Session/');
							/*Referance for fetching old value for update */
						 booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/');
						  ref = 'Cateogry/'+childSnapshot.key+'/Bundle/'+nw+'/Session/'+s;
						}else{
							
							/*Referance for fetching old value for update  */
						 booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/');
						  ref = 'Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/'+s;
						}
						//  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/');
					}else{
						  //Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Session/');
							/*Referance for fetching old value for update  */
						 booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Session/');
						ref = 'Cateogry/'+childSnapshot.key+'/Session/'+s;
					}
			}
			if(old != $("#cat option:selected").text() && $("#cat option:selected").text() == childSnapshot.key){
					if(childSnapshot.hasChild("SubCategory")) {
						//if(sub != $("#subact option:selected").val()){
							var n = $("#subact option:selected").val();
						  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+n+'/Bundle/'+bnd+'/Session/');
					/*	}else{
							
						  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/');
						}*/
						// booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/');
						 ref ='Cateogry/'+childSnapshot.key+'/SubCategory/'+sub+'/Bundle/'+bnd+'/Session/';
					}else if(childSnapshot.hasChild("Bundle")) {
					//	if(bnd != $("#bnd option:selected").val()){
							var nw = $("#bnd option:selected").val();
						  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+nw+'/Session/');
						/*}else{
						  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/');
							
						}*/
						 //booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/');
						  ref = 'Cateogry/'+childSnapshot.key+'/Bundle/'+bnd+'/Session/'+s;
					}else{
						  Ref = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Session/');
						 //booksRef = firebase.database().ref('Cateogry/'+childSnapshot.key+'/Session/');
						ref = 'Cateogry/'+childSnapshot.key+'/Session/'+s;
					}
			}
  
    var childKey = childSnapshot.key;
    var childData = childSnapshot.val();
	 });
	 console.log(ref);
  booksRef.child(s).once('value').then(function(snap) {
  var data = snap.val();
  //data.bookInfo.bookTitle = newTitle;
  var update = {};
  update[s] = null;
		if(old != $("#cat option:selected").text()){
	console.log(data);

					var p = Ref.push();
					var k = p.key;
					data.session_id = k;
					Ref.child(k).set(data);
		}else if(old == $("#cat option:selected").text() && sub != $("#subcat option:selected").text()){
	console.log(data);
			var p = Ref.push();
					var k = p.key;
					data.session_id = k;
					Ref.child(k).set(data);
		}else if(old == $("#cat option:selected").text() && sub == $("#subcat option:selected").text() && bnd != $("#bnd option:selected").text())
		{
	console.log(data);
				var p = Ref.push();
					var k = p.key;
					data.session_id = k;
					Ref.child(k).set(data);
		}else{
	console.log(data);
			
			update[k] = data;
			return booksRef.update(update);
		}
  
});
});
	 
	 
	// var db = firebase.database();

//db.ref("category/test2").update({ session: {"s1":55,"s2":56},bundle: "dd" , subcat: 'sd' });
	 
 }
 /*
	if($("#ID").length){
		$("#ID").html(id);
	}else{
		alert(55);
	}*/
 
