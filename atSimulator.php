<!DOCTYPE html>
<html>
	<head>
		<title>berkenin: İstatistiksel At Koşu Simülatörü</title>
				<meta charset="UTF-8">
		<meta name="description" content="Çok Değişkenli Regresyon Modeliyle At Koşu Süresi Tahmini">
			<meta name="keywords" content="HTML, CSS, JavaScript">
				<meta name="author" content="okank@berkenin.com">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<script src="jquery-3.7.1.slim.min.js"></script>
		<script src="scripts.js"></script>
		<script type="text/javascript">

function ShowHint2(){ 
		let sehir = parseInt(document.getElementById("sehirId").value); 
		let mesafe = parseInt(document.getElementById("mesafeId").value); 
		let kilo  =  parseInt(document.getElementById("kiloId").value);
		let handikap = parseInt(document.getElementById("handikapId").value); 
		let kosuCinsi = parseInt(document.getElementById("kosuCinsiId").value); 
		let pist  =  parseInt(document.getElementById("pistId").value);
		let yas  =  parseInt(document.getElementById("yasId").value);
		let grup = parseInt(document.getElementById("grupId").value);
		let saniye = tahminJS(sehir,mesafe,kilo,handikap,kosuCinsi,pist,yas,grup);
		
		let dakika = parseInt(saniye / 60); 
		let cikansaniye = dakika*60;
		let kalansaniye = saniye-cikansaniye;

		let mesg = "<p>"+dakika+"."+kalansaniye+" de koşar! </p>";

		document.getElementById("txtHint").innerHTML = mesg +" Hata Payı vardır.<br/>" ; 
};

		</script>
					</head>
					<body style="font-family: Verdana;font-size: 10pt;">
						<h2 style="color:blue;">İstatistiksel At Koşu Simülatörü</h2>
						<p>
Referans:<a target=' blank' href='https://gokankocatepe.wordpress.com/2021/08/06/python-ile-cok-degiskenli-regresyon-ornegi/'>metod</a>
						</p>
						<p>Bu sayfada, kamuya malolmuş bir veri örneklem alınarak,<br/> 
Python kütüphanleri ile Çok Değişkenli Regresyon pratiği kullanılmıştır. <br/>
Spor istatistikleri açısından faydalı olacağı düşünülmüştür. <br/>
hiçbir sorumluluk kabul edilmemektedir.<br/>
Aynı fonksiyonlar, arama motorlarında aratılabilir veya uygulanabilir, bunlarla ilgisi bulunmamaktadır.
</p>
Dikkat: Yatırım Tavsiyesi Değildir!
<hr/>

							<table>
								<tr>
									<td>
Şehir:</td>
									<td>
										<select name="sehir" id="sehirId">
											<option value=" -59.7554">Ankara   </option>
											<option value="-137.0564">Bursa    </option>
											<option value=" 169.9465">Elazığ   </option>
											<option value="-125.8004">İstanbul </option>
											<option value="-129.9809">İzmir    </option>
											<option value="-134.0021">Kocaeli  </option>
											<option value="-161.7949">Şanlıurfa</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Mesafe:</td>
									<td>
										<input type="text" name="mesafe" id="mesafeId"/>
									</td>
								</tr>
								<tr>
									<td>Sıklet(Kilo):</td>
									<td>
										<input type="text" name="kilo" id="kiloId"/>
									</td>
								</tr>
								<tr>
									<td>Handikap Puanı:</td>
									<td>
										<input type="text" name="handikapPuani" id="handikapId"/>
									</td>
								</tr>
								<tr>
									<td>
Grup:</td>
									<td>
										<select name="grup" id="grupId">
											<option value=" 361.9616">3 Yaşlı Araplar       </option>
											<option value="-674.0361">3 Yaşlı İngilizler    </option>
											<option value="-583.8127">3 ve Yukarı İngilizler</option>
											<option value=" 664.1021">4 Yaşlı Araplar       </option>
											<option value=" 551.5062">4 ve Yukarı Araplar   </option>
											<option value="-685.7470">4 ve Yukarı İngilizler</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
Koşu Cinsi:</td>
									<td>
										<select name="kosuCinsi" id="kosuCinsiId">
											<option value=" 513.5406">A 3                </option>
											<option value=" 455.0294">A 3 Dişi           </option>
											<option value=" 446.5279">G 1                </option>
											<option value=" 420.4644">G 1 Dişi           </option>
											<option value=" 463.3217">G 2                </option>
											<option value=" 272.2843">G 2 Dişi           </option>
											<option value=" 456.3508">G 3                </option>
											<option value=" 401.1675">G 3 Dişi           </option>
											<option value=" 557.3611">Handikap 13 H2     </option>
											<option value=" 183.2892">Handikap 13 H3     </option>
											<option value=" 630.4076">Handikap 14 Dişi H1</option>
											<option value=" 421.3734">Handikap 14 Dişi H2</option>
											<option value=" 183.1540">Handikap 14 Dişi H3</option>
											<option value=" 469.2886">Handikap 14 H1     </option>
											<option value=" 554.8947">Handikap 14 H2     </option>
											<option value=" 389.8165">Handikap 14 H3     </option>
											<option value=" 329.0257">Handikap 15 Dişi H1</option>
											<option value=" 618.1513">Handikap 15 Dişi H2</option>
											<option value="1189.4216">Handikap 15 Dişi H3</option>
											<option value=" 477.6186">Handikap 15 H1     </option>
											<option value=" 542.1878">Handikap 15 H2     </option>
											<option value=" 418.9088">Handikap 15 H3     </option>
											<option value=" 542.8113">Handikap 16 Dişi H1</option>
											<option value=" 475.8736">Handikap 16 Dişi H2</option>
											<option value=" 212.2399">Handikap 16 Dişi H3</option>
											<option value=" 509.9926">Handikap 16 H1     </option>
											<option value=" 519.6701">Handikap 16 H2     </option>
											<option value=" 680.9179">Handikap 16 H3     </option>
											<option value=" 566.6914">Handikap 17 Dişi H1</option>
											<option value=" 572.1740">Handikap 17 H1     </option>
											<option value=" 460.7896">Handikap 17 H2     </option>
											<option value=" 641.5785">Handikap 17 H3     </option>
											<option value=" 427.8809">Handikap 21 H1     </option>
											<option value=" 723.8886">Handikap 21 H2     </option>
											<option value=" 541.9912">Handikap 22 H1     </option>
											<option value=" 628.2716">Handikap 24 H1     </option>
											<option value=" 510.9397">KV 6               </option>
											<option value=" 608.4736">KV 6 Dişi          </option>
											<option value=" 545.2472">KV 7               </option>
											<option value=" 597.3248">KV 7 Dişi          </option>
											<option value=" 467.5240">KV 8               </option>
											<option value=" 574.2651">KV 8 Dişi          </option>
											<option value=" 429.0629">KV 9               </option>
											<option value=" 574.4450">Maiden             </option>
											<option value=" 582.5839">Maiden Dişi        </option>
											<option value=" 720.8774">Maiden Satis       </option>
											<option value=" 574.8622">Şartlı 2           </option>
											<option value=" 409.6753">Şartlı 2 Dişi      </option>
											<option value=" 599.4866">Şartlı 3           </option>
											<option value=" 595.9085">Şartlı 3 Dişi      </option>
											<option value=" 544.4084">Şartlı 4           </option>
											<option value=" 518.5597">Şartlı 4 Dişi      </option>
											<option value=" 460.4549">Şartlı 5           </option>
											<option value=" 620.1058">Şartlı 5 Dişi      </option>
											<option value=" 605.9834">SATIS 1            </option>
											<option value=" 639.8718">SATIS 2            </option>
											<option value=" 437.0769">SATIS 3            </option>
											<option value=" 653.1385">SATIS 4            </option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
Pist:</td>
									<td>
										<select name="pist" id="pistId">
											<option value="  0     ">Çim     </option>
											<option value="584.9748">Kum     </option>
											<option value="328.6444">Sentetik</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
Yaş:</td>
									<td>
										<select name="yas" id="yasId">
											<option value="-294.1216">2yad</option>
											<option value="-428.7778">2yae</option>
											<option value="-336.5949">2ydd</option>
											<option value="-336.9899">2yde</option>
											<option value="-514.5971">2yke</option>
											<option value=" 141.8873">3yad</option>
											<option value="  88.2232">3yae</option>
											<option value=" 130.0703">3yag</option>
											<option value=" 120.3323">3ydd</option>
											<option value="  64.5070">3yde</option>
											<option value="-167.8742">3ydg</option>
											<option value="  99.8960">3ykd</option>
											<option value=" 133.2165">3yke</option>
											<option value="-111.5191">4yaa</option>
											<option value="  91.1720">4yak</option>
											<option value=" -41.7193">4yda</option>
											<option value=" 161.7587">4ydg</option>
											<option value=" -48.8863">4ydk</option>
											<option value="-260.4037">4yka</option>
											<option value=" 543.3037">4ykg</option>
											<option value="  18.0407">4ykk</option>
											<option value=" -76.1545">5yaa</option>
											<option value=" -12.6619">5yak</option>
											<option value=" -34.2151">5yda</option>
											<option value=" -91.0584">5ydk</option>
											<option value=" -78.3667">5yka</option>
											<option value="-134.7731">5ykk</option>
											<option value=" -22.4554">6yaa</option>
											<option value=" -68.5896">6yag</option>
											<option value=" 270.4291">6yak</option>
											<option value=" -88.0801">6yda</option>
											<option value=" -52.8700">6ydg</option>
											<option value="-226.9932">6ydk</option>
											<option value=" -83.7235">6yka</option>
											<option value=" 244.5206">6ykk</option>
											<option value="  26.9709">7yaa</option>
											<option value=" 280.8243">7yak</option>
											<option value="  -0.4558">7yda</option>
											<option value=" -83.3616">7ydg</option>
											<option value="-160.8000">7ydk</option>
											<option value="-184.3685">7yka</option>
											<option value="   5.4862">7ykk</option>
											<option value="-186.1198">8yaa</option>
											<option value=" -27.9653">8yak</option>
											<option value=" -14.0965">8yda</option>
											<option value=" -31.3552">8yka</option>
											<option value=" 107.0986">9ydk</option>
											<option value="  43.1340">9yka</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
Jokey:</td>
									<td>
										<i>Jokeyler istatistiksel olarak etkili bulunmamıştır.</i>
									</td>
								</tr>
								<tr>
									<td>
										<input type="button" value="Tahmin Et" onclick="ShowHint2();"/>
									</td>
								</tr>
							</table>

						<hr/>

						<strong>
						<br/>
						İstatistiksel Tahminim: <br/>
							<p id="txtHint"></p>
						</strong>
						<hr/>
*23.06.2021-21.08.2021 tarihleri için tjk.org sitesinden alınan <a href="atVeri 20210822 0.txt">veri</a> ile hesaplanmıştır. 
</body>
				</html>