-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: metis.ci7ganrx1sxe.us-east-1.rds.amazonaws.com    Database: Metis
-- ------------------------------------------------------
-- Server version	5.6.27-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `SpellCheckGenericBrand`
--

DROP TABLE IF EXISTS `SpellCheckGenericBrand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SpellCheckGenericBrand` (
  `Drug` varchar(50) NOT NULL DEFAULT '',
  `Correct` varchar(50) DEFAULT NULL,
  `WrongAnswer1` varchar(45) DEFAULT NULL,
  `WrongAnswer2` varchar(45) DEFAULT NULL,
  `WrongAnswer3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Drug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SpellCheckGenericBrand`
--

LOCK TABLES `SpellCheckGenericBrand` WRITE;
/*!40000 ALTER TABLE `SpellCheckGenericBrand` DISABLE KEYS */;
INSERT INTO `SpellCheckGenericBrand` VALUES ('albuterol','Ventolin HFA or Proair HFA or Proventil HFA','Flonase (nasal) or Veramyst (nasal) or Floven','Combivent Respimat or DuoNeb','Pulmicort or Rhinocort Aqua (nasal)'),('albuterol+ipratropium','Combivent Respimat or DuoNeb','Nasonex (nasal) or Asmanex HFA','Spiriva Respimat','Advair HFA or Advair Diskus'),('amitriptyline','Elavil','Flagyl','Elivil','Flagil'),('amlodipine','Norvasc','Neurintin','Norvasck','Flagyl'),('amlodipine+valsartan','Exforge','Keppra','Excalibur','Crestor'),('amoxicillin','Amoxil or Moxatag','Augmentin or Augmentin XR','Avelox or Vigamox (opthalmic)','Bactrim or Bactrim DS or Septra DS'),('amoxicillin+clavulanate potassium','Augmentin or Augmentin XR','Ciprodex','Cipro','Cubicin'),('apixaban','Eliquis','Xarelto','Pradaxa','Aggrenox'),('aripiprazole','Abilify','Aciphex','Aggrenox','Amitriptyline'),('aspirin+dipyridamole','Aggrenox','Lovenox','Tenormin','Avelox'),('atenolol','Tenormin','Timolol','Amoxil','Topmax'),('atorvastatin','Lipitor','Lotensin','Lovinox','Lovenox'),('azithromycin','Zithromax or Zithromax Tri-Pak or Zithromax Z-Pak ','Bactrim or Bactrim DS or Septra DS','Amoxil or Moxatag','Xifaxan'),('beclomethasone (oral inhalation)','Qvar; Qnasl (nasal) or Beconase AQ (nasal)','Spiriva Respimat','Advair HFA or Advair Diskus','Advair HFA or Advair Diskus'),('benazepril','Lotensin','Lopressor','Losartan','Lisinopril'),('budesonide','Pulmicort or Rhinocort Aqua (nasal)','Nasonex (nasal) or Asmanex HFA','Spiriva Respimat','Flonase (nasal) or Veramyst (nasal) or Floven'),('budesonide+formoterol','Symbicort','Nasonex (nasal) or Asmanex HFA','Spiriva Respimat','Qvar or Qnasl (nasal) or Beconase AQ (nasal)'),('carvedilol','Coreg','Calan','Cardiazem','Calen'),('cephalexin','Keflex','Levaquin','Ciprodex','Solodyn'),('ciprofloxacin','Cipro','Cubicin','Vancocin','Cipradex'),('ciprofloxacin+dexamethasone','Ciprodex','Cipro','Cubicin','Vancocin'),('clindamycin','Cleocin','Fluticasone','Keflex','Xifaxan'),('clopidogrel','Plavix','Prevacid','Prinivil','Diflucan'),('dabigatran','Pradaxa','Plavix','Protonix','Protanix'),('daptomycin','Cubicin','Vancomycin','Daptomycin','Minocycline'),('diltiazem','Cardizem or Cartia XT','Cardizem or Cozaar','Zithromax or Zithromax Tri-Pak or Zithromax Z','Prilosec or Prilosec OTC'),('divalproex','Depakote or Depakene','Zyprexa','Seroquel','Requip'),('doxycycline','Vibramycin','Xifaxan','Flagyl','Keflex'),('enalapril','Vasotec','Vibramycin','Vimpat','Invega'),('enoxaparin','Lovenox','Lopressor','Levaquin','Lyrica'),('esomeprazole','Nexium','Topamax','Aciphex','Chantix'),('eszopiclone','Lunesta','Ambien','Levaquin','Lyrica'),('ezetimibe','Zetia','Zofran','Zestril','Zosyn'),('fenofibrate','Tricor','Topamax','Zocor','Vasotec'),('fluconazole','Diflucan','Fluticasone','Symbicort','Zofran'),('fluticasone','Flonase (nasal) or Veramyst (nasal) or Flovent Dis','Nasonex (nasal) or Asmanex HFA','Spiriva Respimat','Xopenex HFA'),('fluticasone+salmeterol','Advair HFA or Advair Diskus','Symbicort','Xopenex HFA','Qvar or Qnasl (nasal) or Beconase AQ (nasal)'),('furosemide','Lasix','Losartan','Lotensin','Lotensin'),('gabapentin','Neurontin','Levofloxacin','Diflucan','Nebivolol'),('guaifenesin+codeine','Cheratussin AC or Robitussin AC','Phenergan','Cheratusin AC or Robitussin AC','Robitusin AC'),('hydrochlorothiazide (HCTZ)','Microzide','Maxzide','Zestoretix','Zithromax'),('lacosamide','Vimpat','Seroquel','Vipmat','Serequel'),('lansoprazole','Prevacid','Protonix','Oleptro','Aciphex'),('levalbuterol','Xopenex HFA','Spiriva Respimat','Advair HFA or Advair Diskus','Symbicort'),('levetiracetam','Keppra','Aciphex','Geodon','Geodin'),('levofloxacin','Levaquin','Cubicin','Ciprodex','Cipro'),('linezolid','Zyvox','Zosyn','Zivox','Zosin'),('lisinopril','Prinivil or Zestril','Prinivil or Microzide','Benicar or Cozaar','Cozaar or Microzide'),('lisinopril+hydrochlorothiazide','Zestoretic','Tricor','Tenormin','Keflex'),('losartan','Cozaar','Lotensin','Lopressor','Cozar'),('lovastatin','Mevacor or Altoprev','Prinivil or Sestril','Altoprev','Avelox or Aggrenox'),('metoprolol succinate','Toprol XL','Losartin','Toporol XL','Losartan'),('metoprolol tartrate','Lopressor','Toporol XL','Toprol XL','Lotensin'),('metronidazole','Flagyl','Vibramycin','Fluticasone','Ventolin HFA'),('minocycline','Solodyn','Zosyn','Zyvox','Xopenex HFA'),('mometasone','Nasonex (nasal) or Asmanex HFA','Qvar or Qnasl (nasal) or Beconase AQ (nasal)','Spiriva Respimat','Advair HFA or Advair Diskus'),('moxifloxacin','Avelox or Vigamox (opthalmic)','Combivent Respimat or DuoNeb','Amoxil or Moxatag','Bactrim or Bactrim DS or Septra DS'),('mupirocin','Bactroban','Aciphex','Chantix','Geodon'),('nebivolol','Bystolic','Cipro','Norvasc','Betimol'),('niacin','Niaspan','Nexium','Cubicin','Neurontin'),('olanzapine','Zyprexa','Keppra','Zofran','Vimpat'),('olmesartan','Benicar','Bystolic','Lotensin','Cleocin'),('olmesartan+hydrochlorothiazide','Benicar HCT','Diovan HCT','Toprol XL','Exforge'),('omega-3-acid','Lovaza','Lipitor','Lovasa','Lovenox'),('omeprazole','Prilosec or Prilosec OTC','Chantix','Zantac','Oleptro'),('ondansetron','Zofran','Prevacid','Nexium','Chantix'),('oseltamivir','Tamiflu','Prevacid','Pradaxa','Privacid'),('paliperidone','Invega','Cephalexin','Inviga','Seroquel'),('pantoprazole','Protonix','Prevacid','Protanix','Topamax'),('Penicillin VK','Penicillin VK','Penicillin K','Penicillin AK','Penicillin PK'),('piperacillin+tazobactam','Zosyn','Zozyn','Zivox','Zosin'),('prasugrel','Effient','Efient','Elavil','Ellavil'),('pravastatin','Pravachol','Pradaxa','Pravichol','Pridaxa'),('pregabalin','Lyrica','Aciphex','Seroquel','Chantix'),('promethazine','Phenergan','Lyrica','Protonix','Phenargan'),('quetiapine','Seroquel','Seroqual','Seraquel','Serequol'),('rabeprazole','Aciphex','Maxalt','Zantac','Ropinirole'),('ranitidine','Zantac','Aciphex','Nexium','Zofran'),('rifaximin','Xifaxan','Fluticasone','Symbicort','Zofran'),('rivaroxaban','Xarelto','Eliquis','Cozaar','Zarelto'),('rizatriptan','Maxalt','Chantix','Penicillin VK','Bactram'),('ropinirole','Requip','Invega','Risperdal','Risperidone'),('rosuvastatin','Crestor','Koreg','Coreg','Krestor'),('simvastatin','Zocor','Tricor','Socor','Trikor'),('simvastatin+ezetimibe','Vytorin','Xifaxan','Vimpat','Invega'),('sulfamethoxazole+trimethoprim','Bactrim or Bactrim DS or Septra DS','Augmentin or Augmentin XR','Avelox, Vigamox (opthalmic)','Combivent Respimat or DuoNeb'),('tiotropium','Spiriva Respimat','Symbicort','Xopenex HFA','Flonase (nasal) or Veramyst (nasal) or Floven'),('topiramate','Topamax','Prilosec','Requip','Ambien'),('trazodone','Oleptro','Oleptra','Oliptro','Chantix'),('triamcinolone','Nasacort AQ (nasal)','Zofran','Phenergan','Prevacid'),('triamterene+hydrochlorothiazide','Maxzide or Dyazide','Maxzide or Microzide','Depakote or Depakene','Microzide or Dyazide'),('valsartan','Diovan','Losartan','Cubicin','Zozyn'),('valsartan+hydrochlorothiazide','Diovan HCT','Benicar HCT','Diovon HCT','Benecar HCT'),('vancomycin','Vancocin','Vancocyn','Nexium','Vibramycin'),('varenicline','Chantix','Lyrica','Zofran','Requip'),('verapamil','Calan or Calan SR or Isoptin SR or Verelan','Calan or Calan SR or Isoptin SR or Cartia XT','Cozaar or Chanti or Isoptin SR or Cartia XT','Calan or Calan SR or Seroquel or Verelan'),('warfarin','Coumadin or Jantoven','Coumadin or Lasix','Coumadin or Plavix','Coumadin or Zestril'),('ziprasidone','Geodon','Zyprexa','Solodyn','Soladyn'),('zolpidem','Ambien','Lunesta','Ambein','Lunesa');
/*!40000 ALTER TABLE `SpellCheckGenericBrand` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-09 20:08:32
