{
    int val=Document.getElementById("")
}

{
    function open_popup() {
                document.getElementById("popup-1").style.display="block";
            }
            function close_popup() {
                document.getElementById("popup-1").style.display="none";
            }
}

{
    $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
            });
}
            {
                $(document).ready(function() {
                                var d = new Date();

                                # To test 29th Feb 2016 uncomment the below line
                                # d = new Date(2016, 01, 29, 10, 33, 30, 0); 


                                curr_year = d.getFullYear(); 
 
                                    for(i = 0; i < 50; i++) 
                                    { 
                                        document.getElementById('year').options[i] = new Option(curr_year-i,curr_year-i); 
                                    }
                                
                                    var month = d.getMonth() + 1;
                                    var year = d.getFullYear();
                                    var date = d.getDate();
                                    
                                    $("#month").val(month); 
                                    $("#year").val(year);    

                                    $("#date").empty();
                                    if(month=="1"){
                                        if($(year).val()%4 == 0){
                                            for(i=1;i<=29;i++){
                                            $("#date").append($("<option></option>").attr("value", i).text(i));
                                            }
                                        }else{
                                            for(i=1;i<=28;i++){
                                                $("#date").append($("<option></option>").attr("value", i).text(i));
                                            }
                                        }
                                    }
                                    else if(month=="9" || month=="4" || month=="6" || month=="11"){
                                        for(i=1;i<=30;i++){
                                            $("#date").append($("<option></option>").attr("value", i).text(i));
                                        }
                                    }
                                    else{
                                        for(i=1;i<=31;i++){
                                            $("#date").append($("<option></option>").attr("value", i).text(i));
                                        }
                                    }
                                    $("#date").val(date);
                                    $('#text').html(d);
                                    
                                    //displayCalGrid(month, year); 
                });
            }