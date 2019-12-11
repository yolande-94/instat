<center>
              <span>Enquete</span>
              <select style="width: 200px;" class="surveyname">
                <?php foreach ($surveys as $survey): ?>
                  
                  <option value="<?= $survey->id; ?>"><?= $survey->name; ?></option>
                 <?php endforeach ?>
              </select>

              <span>Indicateurs</span>
              
              <select style="width: 200px;" class="namesurvey">
                

                  <option value="0" disabled="true" selected="true">Indicateurs</option>
                
              </select>


          </center>