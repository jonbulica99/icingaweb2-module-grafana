<?php
namespace Icinga\Module\Grafana\Forms\Config;

use Icinga\Application\Config;
use Icinga\Forms\ConfigForm;

class GeneralConfigForm extends ConfigForm
{
    /**
     * Initialize this form
     */
    public function init()
    {
        $this->setName('form_config_grafana_general');
        $this->setSubmitLabel('Save Changes');
    }

    /**
     * {@inheritdoc}
     */
    public function createElements(array $formData)
    {
        $this->addElement(
            'text',
            'grafana_username',
            array(
                'placeholder'   	=> '***',
                'label'         	=> $this->translate('Username'),
                'description'   	=> $this->translate('The HTTP Basic Auth user name used to access Grafana.')
            )
        );
        $this->addElement(
            'password',
            'grafana_password',
            array(
		'renderPassword'	=> true,
                'placeholder'   	=> '***',
                'label'         	=> $this->translate('Password'),
                'description'   	=> $this->translate('The HTTP Basic Auth password used to access Grafana.')
            )
        );
        $this->addElement(
            'text',
            'grafana_host',
            array(
                'value'         	=> 'server.name:3000',
                'label'         	=> $this->translate('Host'),
                'description'   	=> $this->translate('Host name of the Grafana server.'),
                'required'              => true
            )
        );
        $this->addElement(
            'select',
            'grafana_protocol',
            array(
                'label'         	=> 'Protocol',
 		'multiOptions' => array(
                    		'http' => $this->translate('Unsecure: http'),
                    		'https' => $this->translate('Secure: https'),
            	),
                'description'   	=> $this->translate('Protocol used to access Grafana.'),
            'class' => 'autosubmit',
            )
        );

        $this->addElement(
            'text',
            'grafana_height',
            array(
                'value'           	=> '280',
                'label'                 => $this->translate('Graph height'),
                'description'           => $this->translate('Graph height in pixels.')
            )
        );
        $this->addElement(
            'text',
            'grafana_width',
            array(
                'value'           	=> '640',
                'label'                 => $this->translate('Graph width'),
                'description'           => $this->translate('Graph width in pixels.')
            )
        );
        $this->addElement(
            'select',
            'grafana_timerange',
            array(
                'label'                 => $this->translate('Timerange now-'),
                'multiOptions' => array(
				'1h' => $this->translate('1 hour'),
                                '3h' => $this->translate('3 hours'),
                                '6h' => $this->translate('6 hours'),
                                '8h' => $this->translate('8 hours'),
                                '12h' => $this->translate('12 hours'),
                                '24h' => $this->translate('24 hours'),
                                '2d' => $this->translate('2 days'),
                ),
                'description'           => $this->translate('Timerange to use for the graphs.')
            )
        );
        $this->addElement(
            'select',
            'grafana_enableLink',
            array(
                'label'                 => $this->translate('Enable link'),
		'multiOptions' => array(
                                'yes' => $this->translate('Yes'),
                                'no' => $this->translate('No'),
                ),
                'description'           => $this->translate('Image is an link to the dashboard on the Grafana server.')
            )
        );
    }
}

