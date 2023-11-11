jQuery(document).ready(function ($) {
  $(".selectmain").change(function () {
    calculateData();
  });
  $(".textbox1, .textbox2, .textbox3, .selectrisk, .acctsize, .maxloss, .selectshort, .acctsize2, .maxloss2, .shorttarget, .atr1selectrisk, .atr2selectrisk, .atr3selectrisk").on("change", function () {
    calculateData();
  });
  
  function calculateData() {

    var data = {
      selectmain: $(".selectmain").val(),
      texbox1: parseFloat($(".textbox1").val()),
      texbox2: parseFloat($(".textbox2").val()),
      texbox3: parseFloat($(".textbox3").val()),
      selectrisk: $(".selectrisk").val(),
      selectshort:  $(".selectshort").val(),
      acctsize: parseFloat($(".acctsize").val()),
      maxloss: parseFloat($(".maxloss").val()),
      acctsize2: parseFloat($(".acctsize2").val()),
      maxloss2: parseFloat($(".maxloss2").val()),
      shorttarget: parseFloat($(".shorttarget").val()),
      atr1selectrisk: $(".atr1selectrisk").val(),
      atr2selectrisk: $(".atr2selectrisk").val(),
      atr3selectrisk: $(".atr3selectrisk").val(),   

     
  
    };
    
    $.ajax({
      type: "POST",
      url: "http://localhost/atr/api/form-ZC/testZC.php",
      data: data,
      dataType: "json",
      success: function (data) {
     

        $(".entryval").text(data.entval);
        $(".retest").text(data.tval3);
        $(".atr1entryval1").text(data.atr1entryval1);
        $(".atr1entryval2").text(data.atr1entryval2);
        $(".atr1entryval3").text(data.atr1entryval3);
        $(".atr2entryval1").text(data.atr2entryval1);
        $(".atr2entryval2").text(data.atr2entryval2);
        $(".atr2entryval3").text(data.atr2entryval3);
        $(".atr3entryval1").text(data.atr3entryval1);
        $(".atr3entryval2").text(data.atr3entryval2);
        $(".atr3entryval3").text(data.atr3entryval3);


        // textbox2() data ...........
        $(".entryprice").text(data.entprice);
        $(".validationprice").text(data.validaprice);
        $(".retestprice").text(data.retestprice);
        $(".atr1shortentryprice").text(data.atr1shortentryprice);
        $(".atr1shortstopprice").text(data.atr1shortstopprice);
        $(".atr1shortexitprice").text(data.atr1shortexitprice);
        $(".atr2shortentryprice").text(data.atr2shortentryprice);
        $(".atr2shortstopprice").text(data.atr2shortstopprice);
        $(".atr2shortexitprice").text(data.atr2shortexitprice);
        $(".atr3shortentryprice").text(data.atr3shortentryprice);
        $(".atr3shortstopprice").text(data.atr3shortstopprice);
        $(".atr3shortexitprice").text(data.atr3shortexitprice);



        // textbox3() call.............

        $(".stopprice").text(data.stopprice);
        $(".invalidprice").text(data.invalidprice);
        $(".rightentryprice").text(data.rightentryprice);
        $(".rightstoporderprice").text(data.rightstoporderprice);
        $(".rightvalidprice").text(data.rightvalidprice);
        $(".rightretest").text(data.rightretest);
        $(".rightinvalid").text(data.rightinvalid);
        $(".rightatr1entryprice").text(data.rightatr1entryprice);
        $(".rightatr1stoporderprice").text(data.rightatr1stoporderprice);
        $(".rightart1existprice").text(data.rightart1existprice);
        $(".rightatr2entryprice").text(data.rightatr2entryprice);
        $(".rightatr2stoporderprice").text(data.rightatr2stoporderprice);
        $(".rightart2existprice").text(data.rightart2existprice);
        $(".rightatr3entryprice").text(data.rightatr3entryprice);
        $(".rightatr3stoporderprice").text(data.rightatr3stoporderprice);
        $(".rightart3existprice").text(data.rightart3existprice);
  


        // contract, calcrisk,call risk


        $(".riskpoints").text(data.riskpoints);
        $(".riskval").text(data.riskval);
        $(".riskval2").text(data.riskval2);
        $(".nqcontracts").text(data.nqcontracts);
        $(".mnqcontracts").text(data.mnqcontracts);
        $(".riskreward").text(data.riskreward);


        // atr1SelectCal....
        $(".atr1riskpoints").text(data.atr1riskpoints);
        $(".atr1escontracts").text(data.atr1escontracts);
        $(".atr1mescontracts").text(data.atr1mescontracts);
        $(".atr1riskreward").text(data.atr1riskreward);


        // atr2SelectCal
        $(".atr2riskpoints").text(data.atr2riskpoints);
        $(".atr2escontracts").text(data.atr2escontracts);
        $(".atr2mescontracts").text(data.atr2mescontracts);
        $(".atr2riskreward").text(data.atr2riskreward);


      // atr2SelectCal
          $(".atr3riskpoints").text(data.atr3riskpoints);
          $(".atr3escontracts").text(data.atr3escontracts);
          $(".atr3mescontracts").text(data.atr3mescontracts);
          $(".atr3riskreward").text(data.atr3riskreward);


      },  error: function(xhr, status, error) {
        console.error(error);
    }
    });
  }
});


