<?php

namespace infoweb\projectform\controllers;

use Yii;
use infoweb\projectform\models\Projectform;
use infoweb\projectform\models\Postsearch;
use infoweb\projectform\models\UploadForm;
use infoweb\projectform\models\Image as ProjectformImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use dektrium\user\models\User;
use yii\imagine\Image;

/**
 * ProjectformController implements the CRUD actions for Projectform model.
 */
class ProjectformController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['superadmin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Projectform models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Postsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projectform model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projectform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projectform();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);          
        } else {            
            return $this->render('create', [
                'model' => $model,
                'users' => User::findAll(['id != :id', ['id' => 12]])
            ]);
        }
    }

    /**
     * Updates an existing Projectform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'users' => User::find()->where('id != 12')->all()
            ]);
        }
    }

    /**
     * Deletes an existing Projectform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Manages the images of an existing Projectform model.
     *
     * @param string $id
     * @return mixed
     */
    public function actionImages($id)
    {
        $model = $this->findModel($id);
        
        if (Yii::$app->request->isPost) {
            
            // Process the uploaded images
            $form = new UploadForm;
            $form->images = UploadedFile::getInstances($form, 'images');
            
            foreach ($form->images as $file)
            {
                // Save the uploaded image
                if ($file->saveAs(Yii::$app->params['uploadPath'] . "/images/{$file->baseName}.{$file->extension}"))
                {                    
                    // Create thumbs
                    foreach (\infoweb\projectform\Module::getInstance()->thumbnailDimensions as $dimension)
                    {
                        Image::thumbnail(Yii::$app->params['uploadPath'] . "/images/{$file->baseName}.{$file->extension}", $dimension['x'], $dimension['y'])
                            ->save(Yii::$app->params['uploadPath'] . "/images/{$dimension['x']}x{$dimension['y']}/{$file->baseName}.{$file->extension}");    
                    }
                       
                    // Save image in the database
                    $image = new ProjectformImage;
                    $image->projectform_id = $model->id;
                    $image->name = $file->name;
                    $image->description = '';
                    
                    $image->save();    
                }
            }
        }
        
        return $this->render('images', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing image
     * 
     * @param   string  $id
     * @return  mixed
     */
    public function actionDeleteImage($id)
    {
        $image = ProjectformImage::findOne($id);
        $image->delete();
        
        return $this->redirect(['images', 'id' => $image->projectform_id]);    
    }

    /**
     * Finds the Projectform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Projectform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projectform::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('De gevraagde pagina bestaat niet.');
        }
    }
}
