<!DOCTYPE html>
<!-- saved from url=(0046)file:///home/itsuncheng/Desktop/interface.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>

table { border-collapse:collapse; padding: "5px"}

th, td {
    text-align: left;
    padding: 3px
    width: 26%
}

.a {border-bottom: 3px solid #000; }
.b {border: 2px solid black}
.c{border: 2px solid black}
.d{border-right: 2px solid black}


</style>
</head>

<body>

<table style="width:40%">
  <thead style="border-bottom: 3px solid #000; padding: 5px">
       <tr>
            <th>照會单位 <input id="organization" type="text" size="13px"></th>
            <th>照會人 <input id="Attendees" type="text" size="13px"></th>
            <th>當天日期<input id="Date" type="text" size="13px"></th>
       </tr>
  </thead>
  <tbody>
    <tr id="a1"><td>姓名:陳</td><td>性别：女</td></tr>

    <tr>
      <td>身高:<span style="display:inline-block; width: 16px;"></span><input id="Height" type="text" size="13px"></td>
      <td>體重:<span style="display:inline-block; width: 16px;"></span><input id="Weight" type="text" size="13px"></td>
      <td>BMI:<span style="display:inline-block; width: 30px;"></span><input id="BMI" type="text" size="13px"></td>
    </tr>
    <tr class="a" style="border-bottom: 3px solid #000; padding: 5px">
      <td>肝功能:<input id="Liver" type="text" size="13px"></td>
      <td>腎功能:<input id="Kidney" type="text" size="13px" <="" td="">
      </td><td>管灌:<span style="display:inline-block; width: 28px;"></span><input id="Tube_irrigation" type="text" size="13px"></td>
    </tr>


  </tbody>
</table>

<span id="a2">醫師姓名: <input id="Liver" type="text" size="13px" value="陳仁祥">   處方日期: <input id="Liver" type="text" size="13px" value="2008/05/10"></span>

<table style="width:40%; border: 2px solid black">

  <tbody style="border: 2px solid black">
    <tr class="c" id="a3">
		<td></td>
		<td class="c" colspan="3">
			<input type="text" id="m1" width="3"><input type="text" id="m2">
		</td>
		<td class="c" colspan="3"><input type="text" id="m3"><input type="text" id="m4"></td>
	</tr>
    <tr class="c" id="a4">
		<td class="c">劑量用法:</td>
		<td colspan="1" class="d"><input type="text" value="每天四次、每次一滴、雙眼用"></td>
		<td colspan="2" class="d"><input type="text" value="每天一次，每次一錠"></td>
		<td colspan="1" class="d"><input type="text" value="早、晚飯後立即使用，每次一錠"></td>
		<td colspan="1" class="d"><input type="text" value="每天兩次、每次兩滴、單眼用"></td>
	</tr>
    <tr class="c" id="a5">
      <td class="c">分级:</td>
      <td class="c" colspan="3"><input type="text" id="zzz"></td>
      <td colspan="2"><input type="text" id="zzz2"></td>
      <td></td>
      <td></td>

    </tr>
    <tr class="c" id="a6">
		<td class="c">藥品相關<br>問題<br>交互作用<br>評估：</td>
		<td class="c" colspan="3">
			<textarea id="ggg" rows="6" cols="40"></textarea>
		</td>
		<td colspan="2">
			<textarea id="ggg2" rows="6" cols="40"></textarea>
		</td>
		<td></td>
		<td></td>



    </tr>
  </tbody>
</table>

藥師建議内容:
<br>
<textarea rows="7" cols="58"></textarea>
列印日期：
<br>

<table style="width:40%">
  <thead style="border-bottom: 3px solid #000; padding: 5px">
       <tr>
            <th></th>
            <th></th>
            <th></th>
       </tr>
  </thead>
  <tbody>

  </tbody>
</table>
醫事人員評估回覆：
<br>
<textarea rows="7" cols="58"></textarea>
日期：



    <script src="/pharmacist/public/vendor/jquery/jquery.min.js"></script>
	<script>
		console.log("test");
		var DataSource = {
			url: "http://140.112.114.59/TaDELS/archiveImage/B_0001_0004_018/B0001_0004_018_001.jpg"
		}
		
		function createTable(data)
		{
			$("#m1").val(data[0]["influences"][0]["influence_1"][0]["A"]);
			$("#m2").val(data[0]["influences"][0]["influence_1"][0]["B"]);	
			$("#zzz").val(data[0]["influences"][0]["influence_1"][0]["Risk Rating"]);	
			$("#ggg").val(data[0]["influences"][0]["influence_1"][0]["PatientManagement"]);
			$("#m3").val(data[0]["influences"][0]["influence_3"][0]["A"]);
			$("#m4").val(data[0]["influences"][0]["influence_3"][0]["B"]);	
			$("#zzz2").val(data[0]["influences"][0]["influence_3"][0]["Risk Rating"]);
			$("#ggg2").val(data[0]["influences"][0]["influence_3"][0]["PatientManagement"]);
	//		$("#result").append($tr);
			
		}
		$(document).ready(function(){
			$.ajax({
				url: 'http://api.myjson.com/bins/1a02pn',
				type: 'get',
				dataType: 'json',
				success: function (data) {
					console.log(data);
					createTable(data);
				},
				data: DataSource
			});
		});
    </script>


</body></html>