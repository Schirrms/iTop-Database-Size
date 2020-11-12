<?php

/**
 * Class AttributeDecimalInIB
 */
class AttributeDecimalInIB extends AttributeDecimal
{
	/**
	 * @inheritdoc
	 */

	public function GetValueLabel($sValue)
	{
		$sValueLabel = parent::GetValueLabel($sValue);
		if(($sValueLabel !== null) && ($sValueLabel !== ''))
		{
			$sUnitSuffix = Dict::S('Class:DBServer/Attribute:UsedSpace/unit');
			$sValueHumanLabel = $sValueLabel.' '.$sUnitSuffix;
			if(is_numeric($sValueLabel))
			{
				$sUnit = ' KMGTPE';
				for ($iLevel=50; $iLevel >0 ;$iLevel=$iLevel-10)
				{
					// next formula give odd results if the value is between 1000 and 1023,9999
					// if ($sValueLabel >= 2**$iLevel)
					if ($sValueLabel >=2**$iLevel+24)
					{
						$sValueHumanLabel = sprintf('%.3g ', $sValueLabel / (2**$iLevel)) . substr($sUnit, $iLevel/10, 1) . 'i'.$sUnitSuffix;
						break;
					}
				}
			}
		}
		else
		{
			$sValueHumanLabel = '-';
		}

		return $sValueHumanLabel;
	}

	/**
	 * @inheritdoc
	 */
	public function GetAsHTML($sValue, $oHostObject = null, $bLocalize = true)
	{
		$sHTMLValue = parent::GetAsHTML($sValue, $oHostObject, $bLocalize);
		if(($sHTMLValue !== null) && ($sHTMLValue !== ''))
		{
			$sUnitSuffix = Dict::S('Class:DBServer/Attribute:UsedSpace/unit');
			$sHTMLHumanValue = $sHTMLValue.' '.$sUnitSuffix;
			if(is_numeric($sHTMLValue))
			{
				$sUnit = ' KMGTPE';
				for ($iLevel=50; $iLevel >0 ;$iLevel=$iLevel-10)
				{
					if ($sHTMLValue >= 2**$iLevel)
					{
						$sHTMLHumanValue = sprintf('%.3g ', $sHTMLValue / (2**$iLevel)) . substr($sUnit, $iLevel/10, 1) . 'i'.$sUnitSuffix;
						break;
					}
				}
			}
		}
		else
		{
			$sHTMLHumanValue = '-';
		}

		return $sHTMLHumanValue;
	}
}