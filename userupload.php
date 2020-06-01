<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- CSS only -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />

    <!-- JS, Popper.js, and jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
</head>
<body>

    <div class="container-fluid">
        <div class="uploadfilearea">
            <div class="row">
            <div class="col-6">
                    <h3>Upload your file here</h3><br>
                    <form enctype="multipart/form-data" action="practice.php" method="POST">
                        
                        <div>
                            <label for="title"><strong>Title:</strong> </label><br />
                            <input type="text" class="form-control" name="title" required/>
                        </div>
                        <div>
                            <label for="author"><strong>Author:</strong></label><br />
                            <input type="text" class="form-control" name="author" required/>
                        </div>
                        <div>
                            <label for="details"><strong>Details:</strong></label><br />
                            <textarea rows = "3" cols = "50" name = "details" class="form-control" required></textarea>
                            </textarea>
                        </div>
                        <div>
                            <p><strong>Select your file:</strong></p>
                            <input type="file" name="uploaded_file" required></input><br />
                        </div>
                        <div>
                            <label for="file_type"><strong>File type:</strong></label><br />
                            <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="document" required>Document</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="video">Video</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="audio">Audio</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="image">Image</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="file_type" value="other">Other</label>
                        </div>
                        <div>
                            <label for="department"><strong>Department:</strong></label><br />
                            <input class="form-control" list="department" type="text" name="department" required>
                            <datalist id="department">
                                <option value="Department of Finance"/>
                                <option value="Department of Health"/>
                                <option value="Department of Eduction"/>
                                <option value="Department of Information and International Relation"/>
                                <option value="Department of Religion and Culture"/>
                                <option value="Department of Security"/>
                                <option value="Department of Home"/>
                                <option value="Kashag"/>
                                <option value="Supreme Justice Court"/>
                                <option value="Tibetan Parliament-in-Exile"/>
                            </datalist>
                            </div>   
                        <div>
                            <label for="language"><strong>Language:</strong></label><br />
                            <label class="block"><input class="form-check-inline" type="radio" name="language" value="tibetan" required>Tibetan</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="language" value="english">Englsih</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="language" value="hindi">Hindi</label>
                            <label class="block"><input class="form-check-inline" type="radio" name="language" value="other">Other</label>
                        </div>
                        <div>
                            <label for="tags"><strong>Tags:</strong></label><br />
                            <input type="text" class="form-control" name="tags" placeholder="ie. tibetan, dalailama, india etc (optimizing search)" />
                        </div>
                        <div>
                            <label for="categry"><strong>Category:</strong></label><br />
                            <div class="row">
                                <div class="col-3">
                                    <input class="form-check-inline" type="radio" name="category" value="report" onclick="javascript:yesnoCheck();" id="reportCheck" checked="checked">Report<br>
                                </div>
                                <div class="col-9" id="reportForm">
                                    <label for="publication">Publication:</label>
                                    <select class="form-control" name="publication">
                                        <option value="internal">Internal</option>
                                        <option value="external">External</option>
                                    </select>
                                    <label for="sector">Sector:</label>
                                    <input class="form-control" list="sector" type="text" name="sector">
                                    <datalist id="sector">
                                        <option value="Education"/>
                                        <option value="Entrepreneurship"/>
                                        <option value="Capacity Building"/>
                                        <option value="ISDP"/>
                                        <option value="Gender"/>
                                        <option value="Banking"/>
                                        <option value="Arts & Culture"/>
                                        <option value="WASH"/>
                                        <option value="Workforce"/>
                                        <option value="Healthcare"/>
                                        <option value="Agriculture"/>
                                        <option value="Dempcracy"/>
                                    </datalist>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-inline" type="radio" name="category" onclick="javascript:yesnoCheck();" id="projectCheck" value="project">Project<br>
                                </div>
                                <div id="projectForm" style="visibility:hidden" class="col-9">
                                    <label for="sector">Include:</label>
                                    <input class="form-control" list="include" type="text" name="include">
                                    <datalist id="include">
                                        <option value="Budget"/>
                                        <option value="Policy"/>
                                        <option value="Guidelines"/>
                                        <option value="M&E"/>
                                        <option value="Timeline"/>
                                        <option value="Financial Report"/>
                                    </datalist>
                                </div>
                                <div class="col-3">
                                    <input class="form-check-inline" type="radio" name="category" onclick="javascript:yesnoCheck();" id="generalCheck" value="general">General<br>
                                </div>
                                <div class="col=9"></div>
                            </div>
                            <script>
                                function yesnoCheck() {
                                    if (document.getElementById('reportCheck').checked) {
                                        document.getElementById('reportForm').style.visibility = 'visible';
                                        document.getElementById('projectForm').style.visibility = 'hidden';
                                    }
                                    else if (document.getElementById('projectCheck').checked) {
                                        document.getElementById('projectForm').style.visibility = 'visible';
                                        document.getElementById('reportForm').style.visibility = 'hidden';
                                    }
                                    else if (document.getElementById('generalCheck').checked) {
                                        document.getElementById('projectForm').style.visibility = 'hidden';
                                        document.getElementById('reportForm').style.visibility = 'hidden';
                                    }
                                    else {
                                        document.getElementById('projectForm').style.visibility = 'hidden';
                                        document.getElementById('reportForm').style.visibility = 'hidden';
                                    }
                                }
                            </script>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-primary float-right" name="submit">SUBMIT</button><br /><br><br>
                       
                    </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>












