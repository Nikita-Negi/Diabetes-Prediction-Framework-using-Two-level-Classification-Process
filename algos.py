#importing libraries
import pandas as pd
import numpy as np
from sklearn.linear_model import LogisticRegression
from sklearn.externals import joblib
import seaborn as sns
import matplotlib.pyplot as plt

#reading csv data
diabetesDF = pd.read_csv('pima.csv')
sns.pairplot(data = diabetesDF, hue = 'Outcome')
#plt.show()
sns.heatmap(diabetesDF.corr(), annot = True)
#plt.show()
#-----------------------------------------------------------------------
#replacing zero values
median_bmi = diabetesDF['BMI'].median()
diabetesDF['BMI'] = diabetesDF['BMI'].replace(to_replace='0', value=median_bmi)
median_bloodp = diabetesDF['BloodPressure'].median()
diabetesDF['BloodPressure'] = diabetesDF['BloodPressure'].replace(to_replace='0', value=median_bloodp)
median_plglcconc = diabetesDF['Glucose'].median()
diabetesDF['Glucose'] = diabetesDF['Glucose'].replace(to_replace='0', value=median_plglcconc)
median_skinthick = diabetesDF['SkinThickness'].median()
diabetesDF['SkinThickness'] = diabetesDF['SkinThickness'].replace(to_replace='0', value=median_skinthick)
median_twohourserins = diabetesDF['Insulin'].median()
diabetesDF['Insulin'] = diabetesDF['Insulin'].replace(to_replace='0', value=median_twohourserins)

#dividing data into train and test section
dfTrain = diabetesDF[:679]
dfTest = diabetesDF[679:]

#converting into numpy array form
trainLabel = np.asarray(dfTrain['Outcome'])
trainData = np.asarray(dfTrain.drop('Outcome',1))
testLabel = np.asarray(dfTest['Outcome'])
testData = np.asarray(dfTest.drop('Outcome',1))

#normalizing data to have zero mean and standard deviation of 1
means = np.mean(trainData, axis=0)
stds = np.std(trainData, axis=0)
trainData = (trainData - means)/stds
testData = (testData - means)/stds

#fitting and training model
diabetesCheck = LogisticRegression(solver='liblinear')
diabetesCheck.fit(trainData, trainLabel)

#finding accuracy for test and train data
accuracy = diabetesCheck.score(testData, testLabel)*100
print('Accuracy of Logistic Regression classifier: {:.2f}%'.format(accuracy))

"""-----------------------------------------------------------------------------------------------------------------------LR(82)-----------------""";

from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(diabetesDF.loc[:, diabetesDF.columns != 'Outcome'], diabetesDF['Outcome'], stratify=diabetesDF['Outcome'], random_state=66)
#from sklearn.neighbors import KNeighborsClassifier
#knn = KNeighborsClassifier(n_neighbors=18)
#knn.fit(X_train, y_train)
#print('Accuracy of K-NN classifier: {:.2f}%'.format(knn.score(X_test, y_test)*100))
#-----------------------------------------------------------------------------------------------------------------------KNN(78)

#from sklearn.tree import DecisionTreeClassifier
#tree = DecisionTreeClassifier(max_depth=4, random_state=10)
#tree.fit(X_train, y_train)
#print("Accuracy of Decision Tree classifier: {:.2f}%".format(tree.score(X_test, y_test)*100))
#-----------------------------------------------------------------------------------------------------------------------DT(81)

from sklearn.ensemble import RandomForestClassifier
rf = RandomForestClassifier(n_estimators=100, random_state=0, max_depth=6)
rf.fit(X_train, y_train)
print("Accuracy of Random Forest classifier: {:.2f}%".format(rf.score(X_test, y_test)*100))
"""-----------------------------------------------------------------------------------------------------------------------RF(82)-----------------""";

from sklearn.ensemble import GradientBoostingClassifier
gb = GradientBoostingClassifier(random_state=0,max_depth=2,learning_rate=0.1,n_estimators=100)
gb.fit(X_train, y_train)
print("Accuracy of Gradient Boosting classifier: {:.2f}%".format(gb.score(X_test, y_test)*100))
"""-----------------------------------------------------------------------------------------------------------------------GB(82)-----------------""";

#from sklearn.svm import SVC
#svc = SVC(kernel='linear')
#svc.fit(X_train, y_train)
#print("Accuracy of Support Vector Machine classifier: {:.2f}%".format(svc.score(X_test, y_test)*100))
#-----------------------------------------------------------------------------------------------------------------------SVM(81)

#from sklearn.neural_network import MLPClassifier
#mlp = MLPClassifier(random_state=30,max_iter=1000)
#mlp.fit(X_train, y_train)
#print("Accuracy of Deep Learning classifier: {:.2f}%".format(mlp.score(X_test, y_test)*100))
#-----------------------------------------------------------------------------------------------------------------------DL(77)

from sklearn.ensemble import VotingClassifier
ensemble = VotingClassifier(estimators=[('LR', diabetesCheck), ('RF', rf), ('GB', gb)],voting='soft', weights=[1,1,4]).fit(X_train,y_train)
print('Accuracy of Ensemble Classifier: {:.2f}%'.format(ensemble.score(X_test,y_test)*100))

from sklearn.metrics import classification_report
y_pred = ensemble.predict(X_test)
print(classification_report(y_test, y_pred))
ensemble=diabetesCheck
#feature importance
coeff = list(diabetesCheck.coef_[0])
coeff=[-1*x for x in coeff]
labels = ["Pregnancies", "Glucose", "BloodPressure", "SkinThickness", "Insulin", "BMI", "DiabetesPedigreeFunction", "Age"]
features = pd.DataFrame()
features['Features'] = labels
features['importance'] = coeff
features.sort_values(by=['importance'], ascending=True, inplace=True)
features['positive'] = features['importance'] > 0
features.set_index('Features', inplace=True)
features.importance.plot(kind='barh', figsize=(11, 6),color = features.positive.map({True: 'blue', False: 'red'}))
plt.xlabel('Importance')
#plt.show()
"""-----------------------------------------------------------------------------------------------------------------------ENSEMBLE(83)---------""";

#from sklearn.ensemble import BaggingClassifier
#bagging = BaggingClassifier(ensemble, max_samples=0.5, max_features=1.0,n_estimators=50).fit(X_train,y_train)
#print('The accuracy for Bagging Classifier is: {:.2f}%'.format(bagging.score(X_test,y_test)*100))
#-----------------------------------------------------------------------------------------------------------------------BAGGING()

#from sklearn.ensemble import AdaBoostClassifier
#boosting = AdaBoostClassifier(ensemble,n_estimators=10,learning_rate=1).fit(X_train,y_train)
#print('The accuracy for Boosting Classifier is: {:.2f}%'.format(boosting.score(X_test,y_test)*100))
#-----------------------------------------------------------------------------------------------------------------------BOOSTING()

#saving the model
joblib.dump([ensemble, means, stds], 'diabeteseModel.pkl')
diabetesLoadedModel, means, stds = joblib.load('diabeteseModel.pkl')

#creating dataframe for sample test data
sample = [1, 136, 41, 35, 165, 43.5, 2.5, 35]
df = pd.DataFrame(sample)
df = df.transpose()
df.columns = ["Pregnancies", "Glucose", "BloodPressure", "SkinThickness", "Insulin", "BMI", "DiabetesPedigreeFunction", "Age"]
df = (df - means)/stds

# predicting for sample value
predictionProbability = diabetesLoadedModel.predict_proba(df)
prob1=predictionProbability[0][0]
prob2=predictionProbability[0][1]
if(prob1>prob2):
    prediction=0
else:
    prediction=1
print(predictionProbability)
print(prediction)

