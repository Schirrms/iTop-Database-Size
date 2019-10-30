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
			$sValueHumanLabel .= $sValueLabel.' B';
			if(is_numeric($sValueLabel))
			{
				$sUnit = ' KMGTPE';
				for ($iLevel=50; $iLevel >0 ;$iLevel=$iLevel-10)
				{
					if ($sValueLabel >= 10**$iLevel)
					{
						$sValueHumanLabel = sprintf('%.3g ', $sValueLabel / (2**$iLevel)) . substr($sUnit, $iLevel/3, 1) . 'B';
						break;
					}
				}
			}
		}
		else
		{
			$sValueLabel = '-';
		}

		return $sValueLabel;
	}

	/**
	 * @inheritdoc
	 */
	public function GetAsHTML($sValue, $oHostObject = null, $bLocalize = true)
	{
		$sHTMLValue = parent::GetAsHTML($sValue, $oHostObject, $bLocalize);
		if(($sHTMLValue !== null) && ($sHTMLValue !== ''))
		{
			$sValueHumanLabel .= $sValueLabel.' B';
			if(is_numeric($sValueLabel))
			{
				$sUnit = ' KMGTPE';
				for ($iLevel=50; $iLevel >0 ;$iLevel=$iLevel-10)
				{
					if ($sValueLabel >= 10**$iLevel)
					{
						$sValueHumanLabel = sprintf('%.3g ', $sValueLabel / (2**$iLevel)) . substr($sUnit, $iLevel/3, 1) . 'B';
						break;
					}
				}
			}
		}
		else
		{
			$sHTMLValue = '-';
		}

		return $sHTMLValue;
	}
}