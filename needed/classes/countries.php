<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

function getCountriesList($code = null) {

	$list = explode(',', 'Andorra	ad,Afghanistan	af,Antigua	ag,Anguilla	ai,Albania	al,Armenia	am,Netherlands Antilles	an,Angola	ao,Argentina	ar,American Samoa	as,Austria	at,Australia	au,Aruba	aw,Aland Islands	ax,Azerbaijan	az,Bosnia	ba,Barbados	bb,Bangladesh	bd,Belgium	be,Burkina Faso	bf,Bulgaria	bg,Bahrain	bh,Burundi	bi,Benin	bj,Bermuda	bm,Brunei	bn,Bolivia	bo,Brazil	br,Bahamas	bs,Bhutan	bt,Bouvet Island	bv,Botswana	bw,Belarus	by,Belize	bz,Canada	ca,Cocos Islands	cc,Congo	cd,Central African Republic	cf,Congo Brazzaville	cg,Switzerland	ch,Cote Divoire	ci,Cook Islands	ck,Chile	cl,Cameroon	cm,China	cn,Colombia	co,Costa Rica	cr,Serbia	cs,Cuba	cu,Cape Verde	cv,Christmas Island	cx,Cyprus	cy,Czech Republic	cz,Germany	de,Djibouti	dj,Denmark	dk,Dominica	dm,Dominican Republic	do,Algeria	dz,Ecuador	ec,Estonia	ee,Egypt	eg,Western Sahara	eh,Eritrea	er,Spain	es,Ethiopia	et,European Union	eu,Finland	fi,Fiji	fj,Falkland Islands	fk,Micronesia	fm,Faroe Islands	fo,France	fr,Gabon	ga,United Kingdom	gb,Scotland	gb sct,Wales	gb wls,Grenada	gd,Georgia	ge,French Guiana	gf,Ghana	gh,Gibraltar	gi,Greenland	gl,Gambia	gm,Guinea	gn,Guadeloupe	gp,Equatorial Guinea	gq,Greece	gr,Sandwich Islands	gs,Guatemala	gt,Guam	gu,Guinea-bissau	gw,Guyana	gy,Hong Kong	hk,Heard Island	hm,Honduras	hn,Croatia	hr,Haiti	ht,Hungary	hu,Indonesia	id,Ireland	ie,Israel	il,India	in,Indian Ocean Territory	io,Iraq	iq,Iran	ir,Iceland	is,Italy	it,Jamaica	jm,Jordan	jo,Japan	jp,Kenya	ke,Kyrgyzstan	kg,Cambodia	kh,Kiribati	ki,Comoros	km,Saint Kitts And Nevis	kn,North Korea	kp,South Korea	kr,Kuwait	kw,Cayman Islands	ky,Kazakhstan	kz,Laos	la,Lebanon	lb,Saint Lucia	lc,Liechtenstein	li,Sri Lanka	lk,Liberia	lr,Lesotho	ls,Lithuania	lt,Luxembourg	lu,Latvia	lv,Libya	ly,Morocco	ma,Monaco	mc,Moldova	md,Montenegro	me,Madagascar	mg,Marshall Islands	mh,Macedonia	mk,Mali	ml,Burma	mm	Myanmar
Mongolia	mn,Macau	mo,Northern Mariana Islands	mp,Martinique	mq,Mauritania	mr,Montserrat	ms,Malta	mt,Mauritius	mu,Maldives	mv,Malawi	mw,Mexico	mx,Malaysia	my,Mozambique	mz,Namibia	na,New Caledonia	nc,Niger	ne,Norfolk Island	nf,Nigeria	ng,Nicaragua	ni,Netherlands	nl,Norway	no,Nepal	np,Nauru	nr,Niue	nu,New Zealand	nz,Oman	om,Panama	pa,Peru	pe,French Polynesia	pf,New Guinea	pg,Philippines	ph,Pakistan	pk,Poland	pl,Saint Pierre	pm,Pitcairn Islands	pn,Puerto Rico	pr,Palestine	ps,Portugal	pt,Palau	pw,Paraguay	py,Qatar	qa,Reunion	re,Romania	ro,Serbia	rs,Russia	ru,Rwanda	rw,Saudi Arabia	sa,Solomon Islands	sb,Seychelles	sc,Sudan	sd,Sweden	se,Singapore	sg,Saint Helena	sh,Slovenia	si,Jan Mayen	sj	Svalbard
Slovakia	sk,Sierra Leone	sl,San Marino	sm,Senegal	sn,Somalia	so,Suriname	sr,Sao Tome	st,El Salvador	sv,Syria	sy,Swaziland	sz,Caicos Islands	tc,Chad	td,French Territories	tf,Togo	tg,Thailand	th,Tajikistan	tj,Tokelau	tk,Timorleste	tl,Turkmenistan	tm,Tunisia	tn,Tonga	to,Turkey	tr,Trinidad	tt,Tuvalu	tv,Taiwan	tw,Tanzania	tz,Ukraine	ua,Uganda	ug,Us Minor Islands	um,United States	us,America
Uruguay	uy,Uzbekistan	uz,Vatican City	va,Saint Vincent	vc,Venezuela	ve,British Virgin Islands	vg,Us Virgin Islands	vi,Vietnam	vn,Vanuatu	vu,Wallis And Futuna	wf,Samoa	ws,Yemen	ye,Mayotte	yt,South Africa	za,U.A.E	ae,Zambia	zm,Zimbabwe	zw');
	
	$items = array();

	foreach ($list as $key => $value) {

		$con = explode('	', $value);
		$items[$key]['flag'] = '<i class="'. strtolower($con[0]) .' flag"></i>';
		$items[$key]['title'] = $con[0];
		$items[$key]['id'] = $con[1];

	}

	return $items;
}
