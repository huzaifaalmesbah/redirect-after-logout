import { useState } from '@wordpress/element';
import { Spinner, SnackbarList, Button } from '@wordpress/components';
import GeneralSettings from './components/features/GeneralSettings';
import RoleSettings from './components/features/RoleSettings';
import { useSettings } from './hooks/useSettings';
import { usePages } from './hooks/usePages';

const App = () => {
    const { settings, updateSettings, saveSettings, isSaving, notices, removeNotice } = useSettings();
    const { pages, isLoading: isPagesLoading } = usePages();
    const [ activeTab, setActiveTab ] = useState( 'general' );

    if ( ! settings ) {
        return (
            <div className="redalo-loading">
                <Spinner />
            </div>
        );
    }

    return (
        <div className="redalo-app">
            <div className="redalo-layout-container">
                <div className="redalo-sidebar">
                    <nav className="redalo-nav">
                        <button 
                            className={ `redalo-nav-item ${ activeTab === 'general' ? 'active' : '' }` }
                            onClick={ () => setActiveTab( 'general' ) }
                        >
                            General Settings
                        </button>
                        <button 
                            className={ `redalo-nav-item ${ activeTab === 'roles' ? 'active' : '' }` }
                            onClick={ () => setActiveTab( 'roles' ) }
                        >
                            Role-Based Redirection
                        </button>
                    </nav>
                </div>

                <div className="redalo-content">
                    { activeTab === 'general' && (
                        <GeneralSettings 
                            settings={ settings } 
                            updateSettings={ updateSettings } 
                            pages={ pages } 
                            isPagesLoading={ isPagesLoading } 
                        />
                    ) }

                    { activeTab === 'roles' && (
                        <RoleSettings 
                            settings={ settings } 
                            updateSettings={ updateSettings } 
                            pages={ pages } 
                            isPagesLoading={ isPagesLoading } 
                        />
                    ) }

                    <div className="redalo-actions">
                        <Button isPrimary onClick={ saveSettings } disabled={ isSaving }>
                            { isSaving ? 'Saving...' : 'Save Settings' }
                        </Button>
                    </div>
                </div>
            </div>
            
            <SnackbarList notices={ notices } onRemove={ removeNotice } />
        </div>
    );
};

export default App;
