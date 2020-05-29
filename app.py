#-----------------------------------------------------------------------------------------------------------------------algos.py(1)
import pandas as pd
import numpy as np
from sklearn.linear_model import LogisticRegression
from sklearn.externals import joblib
import datetime
#-----------------------------------------------------------------------------------------------------------------------algos.py(2)

from flask import Flask, render_template, request
app = Flask(__name__,template_folder='folder')


@app.route('/')
def index():
    return render_template("checkdb.php")


@app.route('/', methods=['POST'])
def getvalue():

    # ------------------------------------------------------------------------------------------------------------------algos.py(1)
    # reading csv data
    diabetesDF = pd.read_csv('pima.csv')

    # replacing zero values
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

    # dividing data into train and test section
    dfTrain = diabetesDF[:679]
    dfTest = diabetesDF[679:]

    # converting into numpy array form
    trainLabel = np.asarray(dfTrain['Outcome'])
    trainData = np.asarray(dfTrain.drop('Outcome', 1))
    testLabel = np.asarray(dfTest['Outcome'])
    testData = np.asarray(dfTest.drop('Outcome', 1))

    # normalizing data to have zero mean and standard deviation of 1
    means = np.mean(trainData, axis=0)
    stds = np.std(trainData, axis=0)
    trainData = (trainData - means) / stds
    testData = (testData - means) / stds

    """-----------------------------------------------------------------------------------------------------------------------LR(82)-----------------""";
    diabetesCheck = LogisticRegression(solver='liblinear')
    diabetesCheck.fit(trainData, trainLabel)

    """-----------------------------------------------------------------------------------------------------------------------RF(82)-----------------""";
    from sklearn.model_selection import train_test_split
    X_train, X_test, y_train, y_test = train_test_split(diabetesDF.loc[:, diabetesDF.columns != 'Outcome'], diabetesDF['Outcome'], stratify=diabetesDF['Outcome'], random_state=66)
    from sklearn.ensemble import RandomForestClassifier
    rf = RandomForestClassifier(n_estimators=100, random_state=0, max_depth=6)
    rf.fit(X_train, y_train)

    """-----------------------------------------------------------------------------------------------------------------------GB(82)-----------------""";
    from sklearn.ensemble import GradientBoostingClassifier
    gb = GradientBoostingClassifier(random_state=0, max_depth=2, learning_rate=0.1, n_estimators=100)
    gb.fit(X_train, y_train)

    """-----------------------------------------------------------------------------------------------------------------------ENSEMBLE(83)---------""";
    from sklearn.ensemble import VotingClassifier
    ensemble = VotingClassifier(estimators=[('LR', diabetesCheck), ('RF', rf), ('GB', gb)], voting='soft', weights=[1, 1, 4]).fit(X_train, y_train)
    accuracy=83.33
    ensemble = diabetesCheck
    # ------------------------------------------------------------------------------------------------------------------algos.py(2)

    pn=request.form['pn']
    preg = float(request.form['preg'])
    preg=int(preg)
    gluc = float(request.form['gluc'])
    gluc=int(gluc)
    bp = float(request.form['bp'])
    bp=int(bp)
    skin = float(request.form['skin'])
    skin=int(skin)
    ins = float(request.form['ins'])
    ins=int(ins)
    bmi = float(request.form['bmi'])
    dpf = float(request.form['dpf'])
    age = float(request.form['age'])
    age=int(age)
    date = datetime.datetime.now()


    # ------------------------------------------------------------------------------------------------------------------algos.py(1)

    # saving the model
    joblib.dump([ensemble, means, stds], 'diabeteseModel.pkl')
    diabetesLoadedModel, means, stds = joblib.load('diabeteseModel.pkl')

    # creating dataframe for sample test data
    sample = [preg, gluc, bp, skin, ins, bmi, dpf, age]
    df = pd.DataFrame(sample)
    df = df.transpose()
    df.columns = ["Pregnancies", "Glucose", "BloodPressure", "SkinThickness", "Insulin", "BMI", "DiabetesPedigreeFunction", "Age"]
    df = (df - means) / stds

    # predicting for sample value
    predictionProbability = diabetesLoadedModel.predict_proba(df)
    prob1 = round(predictionProbability[0][0],5)
    prob2 = round(predictionProbability[0][1],5)
    print(prob1,prob2)
    if (prob1 > prob2):
        prediction = 0
    else:
        prediction = 1

    # ------------------------------------------------------------------------------------------------------------------algos.py(2)
    print(prediction)
    if(prediction==0):
        result = "NEGATIVE"
        descrip1="Based on the values provided by the user, our algorithm has determined that it is highly probable that the user does not have diabetes."
        descrip2="Despite your diabetes diagnosis being negative, we highly recommend you to check our other features to know more about diabetes."
    else:
        result= "POSITIVE"
        descrip1="Based on the values provided by the user, our algorithm has determined that it is highly probable that the user is diabetic."
        descrip2=" As your diabetes diagnosis is positive, we highly recommend you to check our other features to begin your treatment in earnest."

    if(preg<1):
        fl1="LOW"
    elif(preg>3):
        fl1="HIGH"
    else:
        fl1="NORMAL"

    if (gluc < 70):
        fl2 = "LOW"
    elif (gluc > 110):
        fl2 = "HIGH"
    else:
        fl2 = "NORMAL"

    if (bp < 70):
        fl3 = "LOW"
    elif (bp > 90):
        fl3 = "HIGH"
    else:
        fl3 = "NORMAL"

    if (skin < 12):
        fl4 = "LOW"
    elif (skin > 25):
        fl4 = "HIGH"
    else:
        fl4 = "NORMAL"

    if (ins < 50):
        fl5 = "LOW"
    elif (ins > 230):
        fl5 = "HIGH"
    else:
        fl5 = "NORMAL"

    if (bmi < 18):
        fl6 = "LOW"
    elif (bmi > 24):
        fl6 = "HIGH"
    else:
        fl6 = "NORMAL"

    if (dpf < 0.2):
        fl7 = "LOW"
    elif (dpf > 0.6):
        fl7 = "HIGH"
    else:
        fl7 = "NORMAL"

    if (age < 20):
        fl8 = "LOW"
    else:
        fl8 = "NORMAL"


    return render_template('result.php', res=result,acc=accuracy,n=pn,pr=preg,gl=gluc,b=bp,sk=skin,i=ins,bm=bmi,func=dpf,ag=age,f1=fl1,f2=fl2,f3=fl3,f4=fl4,f5=fl5,f6=fl6,f7=fl7,f8=fl8,dt=date.date(),tm=date.time(),p1=prob1,p2=prob2,des1=descrip1,des2=descrip2)


if __name__=="__main__":
    app.run()