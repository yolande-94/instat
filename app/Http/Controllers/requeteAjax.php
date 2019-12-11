<script type="text/javascript">
	$(document).ready(functio(){
       
       $(document).on('change','surveyname',funtion(){
           
           //console.log("its change");

           var id_survey = $(this).val();
           //console.log(id_survey);

           $.ajax({
              
              type:'get',
              url:'{!!URL::to('affichage')!!}',
              data:{'id':id_survey},
              success:funtion(data){
                         console.log('success');
                         console.log(data);
              },

              error:function(){

              }

           })

       });

	});
</script>


$indicatorsBySurvey = array();
        foreach ($resultregions as $resultregion) {
            $indicatorsBySurvey[$resultregion->name][ $resultregion->id_indicator] = $resultregion->year;

}
            dump($indicatorsBySurvey);


            $indicatorsBySurvey = array();
        foreach ($resultregions as $resultregion) {
            $indicatorsBySurvey[$resultregion->year][ $resultregion->id_indicator] = $resultregion->title;

}