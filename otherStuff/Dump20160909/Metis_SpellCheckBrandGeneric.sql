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
-- Table structure for table `SpellCheckBrandGeneric`
--

DROP TABLE IF EXISTS `SpellCheckBrandGeneric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SpellCheckBrandGeneric` (
  `Drug` varchar(100) NOT NULL,
  `Correct` varchar(45) DEFAULT NULL,
  `WrongAnswer1` varchar(45) DEFAULT NULL,
  `WrongAnswer2` varchar(45) DEFAULT NULL,
  `WrongAnswer3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Drug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SpellCheckBrandGeneric`
--

LOCK TABLES `SpellCheckBrandGeneric` WRITE;
/*!40000 ALTER TABLE `SpellCheckBrandGeneric` DISABLE KEYS */;
INSERT INTO `SpellCheckBrandGeneric` VALUES ('Abilify','aripiprazole','apiprazole','arapiprazole','aripiprizole'),('Aciphex','rabeprazole','varenicline','pantoprazole','promethazine'),('Advair HFA or Advair Diskus','fluticasone+salmeterol','varenicline','lansoprazole','budesonide+formoterol'),('Aggrenox','aspirin+dipyridamole','simvastatin+ezetimibe','fluticasone+salmeterol','lisinopril+hydrochlorothiazide'),('Ambien','zolpidem','eszopiclone','zolpedem','ezsopiclone'),('Amoxil or Moxatag','amoxicillin','clindimycin','moxifloxacin','clindamycin'),('Augmentin or Augmentin XR','amoxicillin+clavulanate potassium','ciprofloxacin+dexamethasone','amoxicillin+clavulante potassium','ciprofloxacin+dexmethasone'),('Avelox or Vigamox (opthalmic)','moxifloxacin','levafloxacin','ciprofloxacin','moxafloxacin'),('Bactrim or Bactrim DS or Septra DS','sulfamethoxazole+trimethoprim','amoxicillin+clavulanate potassium','sulfmethoxazole+trimethoprim','amoxicillin+clavulanante potassium'),('Bactroban','mupirocin','Penicliin PK','zolpidem','paliperidone'),('Benicar','olmesartan','cephalexin','losartan','lisinopril'),('Benicar HCT','olmesartan+hydrochlorothiazide','valsartin+hydrochlorothiazide','valsartan+hydrochlorothiazide','triamterene+hydrochlorothiazide'),('Bystolic','nebivolol','rifaxmin','varenicline','niaspan'),('Calan or Calan SR or Isoptin SR or Verelan','verapamil','linezolid','minocycline','azithromycin'),('Cardizem or Cartia XT','diltiazem','cephalexin','vancomycin','clindamycin'),('Chantix','varenicline','pantoprazole','triamcinolone','ranitidine'),('Cheratussin AC or Robitussin AC','guaifenesin+codeine','fluticasone+salmeterol','ciprofloxacin+dexamethasone','lisinopril+hydrochlorothiazide'),('Cipro','ciprofloxacin','clindamycin','cephalexin','amoxicillin'),('Ciprodex','ciprofloxacin+dexamethasone','sulfamethoxazole+trimethoprim','amoxicillin+clavulanate potassium','piperacillin+tazobactam'),('Cleocin','clindamycin','ciprofloxacin','minocycline','doxycycline'),('Combivent Respimat or DuoNeb','albuterol+ipratropium','albuterol','levalbuterol','mometasone'),('Coreg','nebivolol','cubicin','cipro','cubycin'),('Coumadin or Jantoven','warfarin','warfaren','warforin','warfiran'),('Cozaar','losartan','lopressor','lotensin','lasix'),('Crestor','rosuvastatin','atorvistatin','rosuvistatin','atorvastatin'),('Cubicin','daptomycin','vancomycin','budesonide','ranitidine'),('Depakote- or Depakene','divalproex','paliperidone','rabeprazole','zolpidem'),('Diflucan','fluconazole','ranitidine','ondansetron','rabeprazole'),('Diovan','valsartan','losartan','nebivolol','zosyn'),('Diovan HCT','valsartan+hydrochlorothiazide','olmesartan+hydrochlorothiazide','triamterene+hydrochlorothiazide','triemterene+hydrochlorothiazide'),('Effient','prasugrel','parsugrel','clopidogrel','clopadogrel'),('Elavil','amitriptyline','varenicline','ranitidine','rizatriptan'),('Eliquis','apixaban','atenolol','rivaroxaban','dabigatran'),('Exforge','amlodipine+valsartan','amoxicillin','amlodapine+valsartan','levofloxacin'),('Flagyl','metronidazole','ondansetron','rifaximin','budesonide'),('Flonase (nasal) or Veramyst (nasal); Flovent Diskus or Flovent HFA','fluticasone','budesonide','mometasone','fluticazone'),('Geodon','ziprasidone','zyprexa','mupirocin','rifaximan'),('Invega','paliperidone','pregabalin','divalproex','lyrica'),('Keflex','cephalexin','moxifloxacin','ciprofloxacin','cephilexin'),('Keppra','levetiracetam','quetiapine','zolpidem','olanzapine'),('Lasix','furosemide','tiotropium','furosimide','tiatropium'),('Levaquin','levofloxacin','levafloxacin','moxifloxacin','moxafloxacin'),('Lipitor','atorvastatin','simvistatin','atorvistatin','rosuvastatin'),('Lopressor','metoprolol tartrate','metoprol tartrate','metoprolol tartarate','metoprol succinate'),('Lotensin','benazepril','nebivolol','losartan','cozaar'),('Lovaza','omega-3-acid','fenofibrate','losartan','cozaar'),('Lovenox','enoxaparin','clopidogrel','enoxoparin','clopedogrel'),('Lunesta','eszopiclone','lacosamide','zopiclone','mupirocin'),('Lyrica','pregabalin','quetiapine','paliperidone','gabapentin'),('Maxalt','rizatriptan','rabeprazole','gabapentin','risperidone'),('Maxzide or Dyazide','triamterene+hydrochlorothiazide','aspirin+dipyridamole','olmesartan+hydrochlorothiazide','valsartan+hydrochlorothiazide'),('Mevacor or Altoprev','lovastatin','lovaza','lovistatin','lovasa'),('Microzide','hydrochlorothiazide (HCTZ)','triamterene+hydrochlorothiazide','maxzide','dyazide'),('Nasacort AQ (nasal)','triamcinolone','omeprazole','ranitidine','esomeprazole'),('Nasonex (nasal) or Asmanex HFA','mometasone','budesonide+formoterol','mometzone','tiotropium'),('Neurontin','gabapentin','paliperidone','rabeprazole','lacosamide'),('Nexium','esomeprazole','pantoprazole','esomeprasole','ondansetron'),('Niaspan','niacin','nebivolol','niasin','neurontin'),('Norvasc','amlodipine','amoxicillin','amlodipine+valsartan','amoxicilin'),('Oleptro','trazodone','triamcinolone','trazadone','triemcinolone'),('Penicillin VK','Penicillin VK','Penicilln VK','Peniclin CK','Penicilin VK'),('Phenergan','promethazine','pantoprazole','lansoprazole','rabeprazole'),('Plavix','clopidogrel','carvedilol','Calan','Cozaar'),('Pradaxa','dabigatran','apixaban','enoxaparin','prasugrel'),('Pravachol','pravastatin','lovastatin','rosuvastatin','simvastatin'),('Prevacid','lansoprazole','ondansetron','pantoprazole','triamcinolone'),('Prilosec or Prilosec OTC','omeprazole','fluticasone+salmeterol','rifaximin','mometasone'),('Prinivil or Zestril','lisinopril','enalapril','elavil','benazepril'),('Protonix','pantoprazole','promethazine','triamcinolone','lacosamide'),('Pulmicort or Rhinocort Aqua (nasal)','budesonide','varenicline','budezonide','albuterol'),('Qvar or Qnasl (nasal) or Beconase AQ (nasal)','beclomethasone (oral inhalation)','budesonide','albuterol+ipratropium','rifaximin'),('Requip','ropinirole','rizatriptan','risperidone','divalproex'),('Risperdal','risperidone','rivaroxaban','ranitidine','riveroxaban'),('Seroquel','quetiapine','quatiapine','quitiapine','olanzapine'),('Solodyn','minocycline','vancomycin','doxycycline','daptomycin'),('Spiriva Respimat','tiotropium','albuterol+ipratropium','albuterol','lansoprazole'),('Symbicort','budesonide+formoterol','levalbuterol','tiotropium','amoxicillin'),('Tamiflu','oseltamivir','amoxicillin','moxifloxacin','moxafloxacin'),('Tenormin','atenolol','amlodipine','diltiazem','oseltamivir'),('Topamax','topiramate','gabapentin','paliperidone','olanzapine'),('Toprol XL','metoprolol succinate','metoprol tartrate','metoprolol tartrate','metoprol succinate'),('Tricor','fenofibrate','fenifibrate','fenafibrate','fenefibrate'),('Vancocin','vancomycin','rifaximin','metronidazole','ondansetron'),('Vasotec','enalapril','lisinopril','benazepril','elavil'),('Ventolin HFA or Proair HFA or Proventil HFA','albuterol','albuterol+ipratropium','levalbuterol','tiotropium'),('Vibramycin','doxycycline','daptomycin','amoxicillin','fluconazole'),('Vimpat','lacosamide','lacosamide','paliperidone','mupirocin'),('Vytorin','simvastatin+ezetimibe','simvastatin+vyvanase','lovastatin+ezetimibe','simvastatin+lovastatin'),('Xarelto','rivaroxaban','apixaban','enoxaparin','fenofibrate'),('Xifaxan','rifaximin','vancomycin','metronidazole','rabeprazole'),('Xopenex HFA','levalbuterol','budesonide','budesonide','fluticasone'),('Zantac','ranitidine','lansoprazole','rabeprazole','ranitadine'),('Zestoretic','lisinopril+hydrochlorothiazide','olmesartan+hydrochlorothiazide*','lisinopril+hydroclorothiazide','olmesartan+hydroclorothiazide'),('Zetia','ezetimibe','eszopiclone','ezetimbe','essopiclone'),('Zithromax or Zithromax Tri-Pak or Zithromax Z-Pak or Zmax','azithromycin','minocycline','doxycycline','vancomycin'),('Zocor','simvastatin','pravastatin','atovastatin','atorvastatin'),('Zofran','ondansetron','esomeprazole','omeprazole','varenicline'),('Zosyn','piperacillin/tazobactam','minocycline','sulfamethoxazole+trimethoprim','albuterol+ipratropium'),('Zyprexa','olanzapine','olanzipine','olanzopine','olanzepine'),('Zyvox','linezolid','mometasone','linesoliz','fluticasone+salmeterol');
/*!40000 ALTER TABLE `SpellCheckBrandGeneric` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-09 20:08:30
