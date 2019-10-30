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
			$sValueHumanLabel = $sValueLabel.' B';
			/* if(is_numeric($sValueLabel))
			{
				$sUnit = ' KMGTPE';
				for ($iLevel=50; $iLevel >0 ;$iLevel=$iLevel-10)
				{
					if ($sValueLabel >= 2**$iLevel)
					{
						$sValueHumanLabel = sprintf('%.3g ', $sValueLabel / (2**$iLevel)) . substr($sUnit, $iLevel/10, 1) . 'B';
						break;
					}
				}
			}
		}
		else
		{
			$sValueHumanLabel = '-';
		}*/

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
			$sHTMLHumanValue = $sHTMLValue.' B';
			/* if(is_numeric($sHTMLValue))
			{
				$sUnit = ' KMGTPE';
				for ($iLevel=50; $iLevel >0 ;$iLevel=$iLevel-10)
				{
					if ($sHTMLValue >= 2**$iLevel)
					{
						$sHTMLHumanValue = sprintf('%.3g ', $sHTMLValue / (2**$iLevel)) . substr($sUnit, $iLevel/10, 1) . 'B';
						break;
					}
				}
			}
		}
		else
		{
			$sHTMLHumanValue = '-';
		} */

		return $sHTMLHumanValue;
	}
}